<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Detect_Attack;
use Illuminate\Support\Facades\Log;

class DetectAttackMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $input = array_merge($request->query(), $request->all());
        $routeParams = $request->route()->parameters(); // Lấy tham số từ route
        $input = array_merge($input, $routeParams); // Gộp thêm route parameters
        // dd($input);

        $suspicious = false;

        $sqlPatterns = [
            '/\b(select|union|drop|delete|insert|update|where|or|and)\b/i',
            "/('|\"|\`)(\s*?or\s*?|\s*?and\s*?)('|\"|\`)/i", 
            "/(\d+('|\"|\`)\s*?or\s*?('|\"|\`)\d+)/i",
            "/('|\"|\`)\s*(or|and)\s*('|\"|\`)/i",
            '/(\-\-|\/\*)/i',
            '/\b(where|join|group by|order by|limit)\b/i',
        ];

        $xssPatterns = [
            '/<script.*?>.*?<\/script>/i',                      
            '/javascript:/i',                                  
            '/on\w+=(".*?"|\'.*?\'|.*?)/i',                     
            '/<.*?(src|href)=(".*?"|\'.*?\'|.*?javascript:.*?)/i', 
            '/<.*?>/i',                                         
        ];

        foreach ($input as $key => $value) {
            foreach ($sqlPatterns as $pattern) {
                if (is_string($value) && preg_match($pattern, $value)) {
                    $this->logAttack($key, 'SQL Injection', $value);
                    Log::warning('SQL Injection detected!', [
                        'value' => $value,
                        'ip' => $request->ip(),
                        'url' => $request->fullUrl(),
                    ]);
                    $suspicious = true;
                    break;
                }
            }

            foreach ($xssPatterns as $pattern) {
                if (is_string($value) && preg_match($pattern, $value)) {
                    $this->logAttack($key, 'XSS', $value);
                    Log::warning('XSS detected!', [
                        'value' => $value,
                        'ip' => $request->ip(),
                        'url' => $request->fullUrl(),
                    ]);
                    $suspicious = true;
                    break;
                }
            }
        }

        // **************** DDOS Attack *********************
        $ip = $request->ip();
        $cacheKey = 'requests_' . $ip;
        $logKey = 'log_' . $ip;

        // Lấy số lượng yêu cầu từ Cache
        $requests = Cache::get($cacheKey, 0);
        $requests++;
        Cache::put($cacheKey, $requests, now()->addSeconds(60)); // Reset sau 60 giây

        // Nếu vượt quá ngưỡng (ví dụ: 100 yêu cầu/phút)
        $threshold = 20;
        if ($requests > $threshold) {
             // Kiểm tra xem đã log sự kiện này chưa
            if (!Cache::has($logKey)) {
                Detect_Attack::create([
                    'attack_type' => 'DDoS',
                    'detected_at' => now(),
                    'details' => "High number of requests detected from IP: " . $ip . "on Url: " . $request->fullUrl(),
                ]);
    
                Log::warning('DDos detected!', [
                    'ip' => $ip,
                ]);

                // Đánh dấu đã log (không log lại trong 5 phút)
                Cache::put($logKey, true, now()->addMinutes(5));
            }
            

            // Phản hồi với mã 429 (Too Many Requests)
            // return response()->json(['message' => 'Too many requests. Please try again later.'], 429);
        }

       
        return $next($request);
    }

    protected function logAttack($parameter, $type, $value)
    {
        Detect_Attack::create([
            'attack_type' => $type,
            'detected_at' => now(),
            'details' => "Suspicious $type detected in parameter: $parameter with value: $value",
        ]);
    }
}
