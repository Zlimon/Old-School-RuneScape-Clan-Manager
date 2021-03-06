<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbyssalSireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abyssal_sire', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained();
            $table->integer('kill_count')->default(0)->unsigned();
            $table->integer('rank')->default(0)->unsigned();
            $table->integer('obtained')->default(0)->unsigned();
            $table->integer('abyssal_orphan')->default(0)->unsigned();
            $table->integer('unsired')->default(0)->unsigned();
            $table->integer('abyssal_head')->default(0)->unsigned();
            $table->integer('bludgeon_spine')->default(0)->unsigned();
            $table->integer('bludgeon_claw')->default(0)->unsigned();
            $table->integer('bludgeon_axon')->default(0)->unsigned();
            $table->integer('jar_of_miasma')->default(0)->unsigned();
            $table->integer('abyssal_dagger')->default(0)->unsigned();
            $table->integer('abyssal_whip')->default(0)->unsigned();
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
        Schema::dropIfExists('abyssal_sire');
    }
}
