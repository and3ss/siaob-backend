<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtarefa extends Model
{
    public function tarefa()
    {
        return $this->belongsTo(Tarefa::class);
    }
}
