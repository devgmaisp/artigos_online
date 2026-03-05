<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artigos extends Model
{
    protected $fillable = [
        'titulo',
        'conteudo',
        'file_path',
        'active',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
