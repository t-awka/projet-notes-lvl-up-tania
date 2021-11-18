<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    public function notes(){
        return $this->belongsTo(Note::class, 'note_id', 'id');
    }
}
