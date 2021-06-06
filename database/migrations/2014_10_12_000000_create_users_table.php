<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(1);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->integer('id_setor');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('users')->insert(
            array(
                array(
                    'first_name' => 'Anderson',
                    'last_name' => 'Aluizio',
                    'id_setor' => 1,
                    'email' => 'anderson.aluizio@outlook.com',
                    'password' => '$2y$10$ONbpJZ2.XEiV6GfNIM447.l36fEXpx8IG609o6/0GRYdH8zcZ2qSS',
                ),
                array(
                    'first_name' => 'Alfredo',
                    'last_name' => 'NP',
                    'id_setor' => 1,
                    'email' => 'alfredo@norteplan.com',
                    'password' => '$2y$10$ONbpJZ2.XEiV6GfNIM447.l36fEXpx8IG609o6/0GRYdH8zcZ2qSS',
                )
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
        Schema::dropIfExists('users');
    }
}
