<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = "setores";

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_setor');
    }
}
