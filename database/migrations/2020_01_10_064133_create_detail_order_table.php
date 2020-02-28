<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('detail_product_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('detail_product_id')->references('id')
                ->on('detail_product')->onDelete('cascade');
            $table->foreign('order_id')->references('id')
                ->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_order');
    }
}
