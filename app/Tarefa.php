<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $hidden = ['objSubtarefa'];
    protected $appends = ['subtarefas'];

    public function getSubtarefasAttribute()
    {
        return $this->objSubtarefa;
    }

    public function objSubtarefa()
    {
        return $this->hasMany(Subtarefa::class, 'tarefa_id', 'id');
    }
}
