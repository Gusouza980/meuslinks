<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    public function element(){
        return $this->belongsTo(Elementos::class, "elemento_id", "id");
    }
}
