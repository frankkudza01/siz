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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('location');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('profile')->nullable();
            $table->date('registration_date');
            $table->enum('membership_type', ['Principal', 'Normal']);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->text('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
