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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('origin_cost');
            $table->integer('sale_cost');
            $table->text('description');
            $table->text('content');
            $table->string('slug');
            $table->string('user_id');
            $table->integer('category_id');
            $table->integer('quantity');
            $table->integer('status')->default(0);
            $table->string('reason')->default("");
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
