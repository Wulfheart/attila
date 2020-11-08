<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('phases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->foreignId('previous_phase_id')->nullable()->constrained('phases')->cascadeOnDelete();
            $table->string('name');
            $table->dateTime('started_at');
            $table->dateTime('ended_at')->nullable();
            $table->integer('length');
            $table->longText('svg_adjudicated')->nullable();
            $table->longText('svg_with_orders')->nullable();
            $table->longText('state');
            $table->boolean('adjudicated')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phases');
    }
}
