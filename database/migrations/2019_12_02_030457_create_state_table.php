<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state_name_ar');
            $table->string('state_name_en');
            $table->integer('cites_id')->unsigned();
            $table->foreign('cites_id')->references('id')->on('cites')->onDelete("cascade");
            $table->integer('contries_id')->unsigned();
            $table->foreign('contries_id')->references('id')->on('contries')->onDelete("cascade");
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
        Schema::dropIfExists('state');
    }
}
