<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $hidden = ['subtarefaObj'];
    protected $appends = ['subtarefas'];

    public function getSubtarefasAttribute()
    {
        return $this->subtarefaObj;
    }

    public function subtarefaObj()
    {
        return $this->hasMany(Subtarefa::class);
    }
}
