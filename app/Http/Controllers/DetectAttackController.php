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
        // $detect_attacks = DB::select("SELECT * FROM detect_attacks where id = $id");
        return view('admincp.detect_attack.detect_attack_home', compact('detect_attacks'));
    }

    public function destroy_detect_attack(Request $request, $id) {
        Detect_Attack::destroy($id);
        return redirect()->route('detect-attack-home');
    }
}
