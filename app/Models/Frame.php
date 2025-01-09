<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'frames';
    protected $fillable = ['movie_id', 'frame_path'];
}
