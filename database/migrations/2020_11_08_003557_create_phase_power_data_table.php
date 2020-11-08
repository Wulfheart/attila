<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhasePowerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('phase_power_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phase_id')->constrained()->cascadeOnDelete();
            $table->foreignId('power_id')->constrained()->cascadeOnDelete();
            $table->integer('unit_count');
            $table->integer('supply_center_count');
            $table->integer('build_count');
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
        Schema::dropIfExists('phase_power_data');
    }
}
