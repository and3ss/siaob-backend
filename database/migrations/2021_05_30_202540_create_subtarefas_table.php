<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtarefas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('tarefa_id');
            $table->string('nome');
            $table->index(['tarefa_id', 'nome']);
            $table->timestamps();
        });

        DB::table('subtarefas')->insert(
            array(
                ['tarefa_id' => 1, 'nome' => 'Levantamento'],
                ['tarefa_id' => 1, 'nome' => 'Desenho'],
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
        Schema::dropIfExists('subtarefas');
    }
}
