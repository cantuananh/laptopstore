<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('detail_product_id')->unsigned();
            $table->integer('bill_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('bill_id')->references('id')
                ->on('bills')->onDelete('cascade');
            $table->foreign('detail_product_id')->references('id')
                ->on('detail_product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_detail');
    }
}
