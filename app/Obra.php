<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'local', 'valor',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['tarefas', 'subtarefas', 'responsaveis'];

    /**
     * The appended attributes shown in JSON results.
     *
     * @var array
     */
    protected $appends = ['tarefa', 'subtarefa', 'nomeResponsavel', 'setorResponsavel'];

    /**
     * The `tarefa` attribute accessor for JSON results.
     *
     * @var string
     */
    public function getTarefaAttribute()
    {
        return $this->tarefas->nome;
    }

    /**
     * The `subtarefa` attribute accessor for JSON results.
     *
     * @var string
     */
    public function getSubtarefaAttribute()
    {
        return $this->subtarefas->nome;
    }

    /**
     * The `nome.responsavel` attribute accessor for JSON results.
     *
     * @var string
     */
    public function getNomeResponsavelAttribute()
    {
        return $this->responsaveis->first_name.' '.$this->responsaveis->last_name;
    }

    /**
     * The `setor.responsavel` attribute accessor for JSON results.
     *
     * @var string
     */
    public function getSetorResponsavelAttribute()
    {
        return $this->responsaveis->setor;
    }

    /**
     * Relates table `tarefas` with `obras`.
     *
     * @var string
     */
    public function tarefas()
    {
        return $this->hasOne(Tarefa::class, 'id', 'tarefa_id');
    }

    /**
     * Relates table `subtarefas` with `obras`.
     *
     * @var string
     */
    public function subtarefas()
    {
        return $this->hasOne(Subtarefa::class, 'id', 'subtarefa_id');
    }

    /**
     * Relates table `users` with `obras`.
     *
     * @var string
     */
    public function responsaveis()
    {
        return $this->hasOne(User::class, 'id', 'responsavel_id');
    }
}
