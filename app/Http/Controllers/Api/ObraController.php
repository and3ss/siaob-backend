<?php

namespace App\Http\Controllers\Api;

use App\Obra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $obras = Obra::with('responsaveis')->get();
        $obras = Obra::all();
        // $obras->load('tarefas');
        // $obras = Obra::with('tarefas:id,nome')->get();
        return response()->json($obras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obra = new Obra();
        $obra->linked = $request->linked;
        $obra->tipo = $request->tipo;
        $obra->dataReferencia = $request->dataReferencia;
        $obra->dataInicioVigencia = $request->dataInicioVigencia;
        $obra->dataFinalVigencia = $request->dataFinalVigencia;
        $obra->dataPublicacao = $request->dataPublicacao;
        $obra->dataUltimaLiberacao = $request->dataUltimaLiberacao;
        $obra->dataConclusao = $request->dataConclusao;
        $obra->situacao = $request->situacao;
        $obra->titulo = $request->titulo;
        $obra->objeto = $request->objeto;
        $obra->orgao = $request->orgao;
        $obra->uf = $request->uf;
        $obra->cidade = $request->cidade;
        $obra->local = $request->local;
        $obra->valor = $request->valor;
        $obra->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function show(Obra $obra)
    {
        // $tarefaObj = $obra->tarefas()->first();
        // $obra->tarefa = $tarefaObj['nome'];
        // // $tarefa = $obra->tarefas()->first();
        return response()->json($obra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obra $obra)
    {
        $obra->tipo = $request->tipo;
        $obra->dataReferencia = $request->dataReferencia;
        $obra->dataInicioVigencia = $request->dataInicioVigencia;
        $obra->dataFinalVigencia = $request->dataFinalVigencia;
        $obra->dataPublicacao = $request->dataPublicacao;
        $obra->dataUltimaLiberacao = $request->dataUltimaLiberacao;
        $obra->dataConclusao = $request->dataConclusao;
        $obra->situacao = $request->situacao;
        $obra->titulo = $request->titulo;
        $obra->objeto = $request->objeto;
        $obra->orgao = $request->orgao;
        $obra->uf = $request->uf;
        $obra->cidade = $request->cidade;
        $obra->local = $request->local;
        $obra->valor = $request->valor;
        $obra->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obra $obra)
    {
        $obra->delete();
    }
}
