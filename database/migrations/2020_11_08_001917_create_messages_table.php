<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->dateTime('sent_at');
            $table->dateTime('read_at')->nullable();
            $table->boolean('global')->default(false);
            $table->foreignId('sending_power_id')->constrained('powers')->cascadeOnDelete();
            $table->foreignId('receiving_power_id')->nullable()->constrained('powers')->cascadeOnDelete();
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
        Schema::dropIfExists('messages');
    }
}
