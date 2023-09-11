<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable  extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_room_id')
                    ->references('id')
                    ->on('meeting_rooms');
            $table->dateTime('start_meeting')->nullable();
            $table->dateTime('finish_meeting')->nullable();
            $table->enum('status_meeting', ['Finalizado', 'En proceso', 'Programado'])->default('Programado');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
