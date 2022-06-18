<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRobinStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robin_stars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->integer('robin_id');
            $table->tinyInteger("is_effect");
            $table->text('description')->nullable()->comment("说明");
            $table->timestamps();
            $table->index('id');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('robin_stars');
    }
}
