<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
    ];
    public $timestamps = false;
    public function tag() {
    
        return $this->hasMany(Tag::class);
       
    }
    public function video() {
    
        return $this->hasMany(Video::class);
       
    }
}
