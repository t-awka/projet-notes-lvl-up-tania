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
        return $this->belongsToMany(User::class, 'note_role_user_pivots');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function likes(){
        return $this->belongsToMany(Like::class, 'likes');
    }
    public function shares(){
        return $this->belongsToMany(Note::class, 'shares');
    }
}
