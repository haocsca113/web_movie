<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Detect_Attack;

class DetectAttackController extends Controller
{
    public function detect_attack_home() {
        $detect_attacks = Detect_Attack::orderBy('detected_at', 'asc')->get();
        return view('admincp.detect_attack.detect_attack_home', compact('detect_attacks'));
    }

    // public function detect_attack(Request $request) {
    //     $queryParams = $request->getQueryString();

    //     // $suspiciousPatterns = [
    //     //     "/'.*--/",          // Dấu nháy đơn và ký hiệu comment SQL
    //     //     "/' OR '1'='1/",    // Mẫu phổ biến của SQL injection
    //     //     "/UNION SELECT/i",  // Từ khóa UNION SELECT
    //     //     "/1=1--/",          // Mẫu điều kiện luôn đúng
    //     // ];

    //     if($queryParams) {
    //         $patterns = [
    //             '/\b(select|union|drop|delete|insert|update)\b/i',  
    //             '/(\'|")(or|and)(\s*)(\d|=)/i',                    
    //             '/(\-\-|\/\*)/',                                   
    //         ];
    
    //         foreach ($patterns as $pattern) {
    //             if (preg_match($pattern, $queryParams)) {
    //                 Detect_Attack::create([
    //                     'user_id' => Auth::user() ? Auth::user()->id : null,
    //                     'attack_type' => 'SQL Injection',
    //                     'detected_at' => now(),
    //                     'details' => 'SQL syntax error found in response.',
    //                 ]);

    //                 // Ghi log thông báo
    //                 \Log::warning('SQL Injection detected!', [
    //                     'query' => $queryParams,
    //                     'ip' => $request->ip(),
    //                 ]);
    //             }
    //         }
    
    //         return redirect()->route('detect-attack-home')->with('message', 'No attacks detected.');
    //     }
    // }
}
