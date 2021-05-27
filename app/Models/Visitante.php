<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    public function acessos(){
        return $this->hasMany(Acesso::class);
    }

    public function clicks(){
        return $this->hasMany(Click::class);
    }
}
