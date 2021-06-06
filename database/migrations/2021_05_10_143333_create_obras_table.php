<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('convenio')->nullable()->unique();
            $table->tinyInteger('linked');
            $table->integer('tipo');
            $table->string('situacao');
            $table->string('titulo')->nullable();
            $table->mediumText('objeto');
            $table->string('dataReferencia')->nullable();
            $table->string('dataInicioVigencia')->nullable();
            $table->string('dataFinalVigencia')->nullable();
            $table->string('dataPublicacao')->nullable();
            $table->string('dataUltimaLiberacao')->nullable();
            $table->string('dataConclusao')->nullable();
            $table->integer('uf');
            $table->integer('cidade');
            $table->string('local');
            $table->string('orgao');
            $table->double('valor', 8, 2)->nullable();
            $table->integer('tarefa_id')->default(1);
            $table->integer('subtarefa_id')->default(1);
            $table->integer('responsavel_id')->nullable()->default(1);
            $table->timestamps();
            $table->index(['situacao', 'tarefa_id', 'responsavel_id']);
        });

        // DB::table('obras')->insert(
        //     array(
        //         array(
        //             'situacao' => 'CONCLUÍDO',
        //             'titulo' => 'PAC 2 - Construção de Quadra Escolar Coberta 005/2013',
        //             'local' => 'Esperantina - PI',
        //             'valor' => 510000,
        //             'tarefa_id' => 2,
        //             'responsavel_id' => 1,
        //         ),
        //         array(
        //             'situacao' => 'ASSINADO',
        //             'titulo' => 'ESCOLA MUNICIPAL 4 SALAS - Esperantina - PI (1017696)',
        //             'local' => 'Esperantina - PI',
        //             'valor' => 23121,
        //             'tarefa_id' => 3,
        //             'responsavel_id' => 2,
        //         )
        //     )
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras');
    }
}
