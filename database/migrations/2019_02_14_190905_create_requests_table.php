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
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document')->unique();
            $table->string('photo');
            $table->string('name');
            $table->string('lastname');
            $table->date('date');
            $table->text('address');
            $table->integer('telephone')->unsigned();
            $table->string('department')
            $table->string('municipality');
            $table->tinyInteger('status');//status for request :solicitado:en proceso:listo para entrega;
            $table->integer('id_user');
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
