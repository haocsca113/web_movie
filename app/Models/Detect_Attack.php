<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detect_Attack extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'detect_attacks';
    protected $fillable = ['attack_type', 'detected_at', 'details'];
}
