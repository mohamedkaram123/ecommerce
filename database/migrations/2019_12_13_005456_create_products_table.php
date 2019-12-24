<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
          
            $table->string('photo');
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete("cascade");
           
            $table->integer('trademarkt_id')->unsigned()->nullable();
            $table->foreign('trademarkt_id')->references('id')->on('trademark')->onDelete("cascade");

            $table->integer('manufact_id')->unsigned()->nullable();
            $table->foreign('manufact_id')->references('id')->on('manufact')->onDelete("cascade");

            $table->integer('mall_id')->unsigned()->nullable();
            $table->foreign('mall_id')->references('id')->on('mall')->onDelete("cascade");


            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('color')->onDelete("cascade");

            $table->integer('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('size')->onDelete("cascade");

            $table->integer('weight_id')->unsigned()->nullable();
            $table->foreign('weight_id')->references('id')->on('weight')->onDelete("cascade");
           
            $table->integer('currancy_id')->unsigned()->nullable();
            $table->foreign('currancy_id')->references('id')->on('contries');

           
            $table->longtext('content')->nullable();
            $table->string('wight');
            $table->integer('price')->default(0);
            $table->integer('stock')->default(0);
            $table->longText('other_data');

            $table->enum('status',['active','refused','pending'])->default("pending");
            $table->longText('reason')->nullable();
            $table->date('end_at')->nullable();
            $table->date('start_at')->nullable();
            $table->date('end_offer_at')->nullable();
            $table->date('start_offer_at')->nullable();
          $table->integer('price_offer')->default(0);

            
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
        Schema::dropIfExists('products');
    }
}
