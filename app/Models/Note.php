<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    public function rolepluses(){
        return $this->belongsToMany(Roleplus::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
