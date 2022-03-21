<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class, "completo_por", "id");
    }
}
