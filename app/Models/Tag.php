<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
       
    ];
    public $timestamps = false;
    public function video() {
    
        return $this->hasMany(Video::class);
       
    }
    public function post() {
    
        return $this->hasMany(Post::class);
       
    }
}
