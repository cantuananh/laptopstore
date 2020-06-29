<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('brand_id')->unsigned();
            $table->string('image')->default('default.jpg');
            $table->string('ram');
            $table->string('microprocessors');
            $table->string('screen');
            $table->string('description');
            $table->bigInteger('cost');
            $table->bigInteger('price');
            $table->integer('quantity');
            $table->integer('guarantee_time');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')
                ->on('brands')->onDelete('cascade');
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
