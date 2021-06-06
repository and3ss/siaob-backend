<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->index('nome');
            $table->timestamps();
        });

        DB::table('tarefas')->insert(
            array(
                ['nome' => 'Projeto de Engenharia'],
                ['nome' => 'Entrega Órgão'],
                ['nome' => 'Licitação'],
                ['nome' => 'Solicitação de Recursos'],
                ['nome' => 'Execução Física'],
                ['nome' => 'Medições Pagamentos'],
                ['nome' => 'Prestação de Contas'],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
