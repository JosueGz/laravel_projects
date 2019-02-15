<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_document')->default('');
            $table->string('photo')->default('');
            $table->string('name');
            $table->string('lastname');
            $table->date('birthdate');
            $table->text('address');
            $table->integer('telephone');
            $table->string('department');
            $table->string('municipality');
            $table->tinyInteger('status')->default('1');//status for request :solicitado:en proceso:listo para entrega;
            $table->integer('user_id');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
