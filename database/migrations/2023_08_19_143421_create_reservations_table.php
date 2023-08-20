<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('sheet_id');
            $table->string('email', 255);
            $table->string('name', 255);
            $table->boolean('is_canceled')
                ->default(false);
            $table->timestamps();

            $table->foreign('schedule_id')
                ->references('id')
                ->on('schedules');
            $table->foreign('sheet_id')
                ->references('id')
                ->on('sheets');
            $table->unique(['schedule_id', 'sheet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
