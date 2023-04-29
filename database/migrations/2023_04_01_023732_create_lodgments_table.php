<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLodgmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lodgments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->default('');
            $table->integer('price');
            $table->integer('reservation_price');
            $table->integer('stars')->default(1);
            $table->string('description');
            $table->text('details');
            $table->integer('pieces');
            $table->string('type');
            $table->string('location');
            $table->string('town')->nullable();
            $table->text('img_path');
            $table->boolean('state')->default(false);
            $table->integer('user_id');
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
        Schema::dropIfExists('lodgments');
    }
}
