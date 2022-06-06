<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('bar_code')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('location')->nullable();
            $table->string('on_hand')->nullable();
            $table->string('price')->nullable();
            $table->string('photo')->nullable();
            $table->integer('qty')->nullable();
            $table->string('model')->nullable();
            $table->string('make')->nullable();
            $table->string('style')->nullable();
            $table->text('pictures')->nullable();
            $table->text('invoices')->nullable();
            $table->string('warranty_time')->nullable();
            $table->string('warranty_interval')->nullable();
            $table->string('prices')->nullable();
            $table->string('discount')->nullable();
            $table->string('description')->nullable();
            $table->string('order_status')->nullable();
            $table->string('order_id')->nullable();
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
        Schema::dropIfExists('parts');
    }
}
