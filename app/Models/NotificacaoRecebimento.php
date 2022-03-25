<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificacaoRecebimento extends Model
{
    use HasFactory;

    public function notificacao(){
        return $this->belongsTo(Notificacao::class);
    }
}
