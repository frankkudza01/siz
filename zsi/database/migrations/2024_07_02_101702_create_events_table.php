<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('theme')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->enum('event_type', ['Workshops', 'Conferences', 'Webinars', 'Training Sessions', 'Networking Events']);
            $table->string('type'); // physical or virtual
            $table->string('venue')->nullable();
            $table->string('virtual_link')->nullable();
            $table->string('meeting_id')->nullable();
            $table->string('passcode')->nullable();
            $table->string('category'); // free or paid
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
