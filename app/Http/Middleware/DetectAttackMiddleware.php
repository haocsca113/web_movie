<?php

namespace App\Http\Middleware;

use Closure;
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
        // dd($input);

        $suspicious = false;

        $sqlPatterns = [
            '/\b(select|union|drop|delete|insert|update|where|or|and)\b/i',
            "/('|\"|\`)(\s*?or\s*?|\s*?and\s*?)('|\"|\`)/i", 
            "/(\d+('|\"|\`)\s*?or\s*?('|\"|\`)\d+)/i",
            "/('|\"|\`)\s*(or|and)\s*('|\"|\`)/i",
            '/(\-\-|\/\*)/i',
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
