<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkotizosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skotizos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->unique();
            $table->integer('obtained')->default(0)->unsigned();
            $table->integer('kill_count')->default(0)->unsigned();
            $table->integer('uncut_onyx')->default(0)->unsigned();
            $table->integer('skotos')->default(0)->unsigned();
            $table->integer('ancient_shard')->default(0)->unsigned();
            $table->integer('dark_totem')->default(0)->unsigned();
            $table->integer('dark_claw')->default(0)->unsigned();
            $table->integer('jar_of_darkness')->default(0)->unsigned();
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
        Schema::dropIfExists('skotizos');
    }
}