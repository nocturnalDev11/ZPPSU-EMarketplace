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
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key 'id'
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->foreignId('recipient_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('content_title')->nullable();
            $table->string('content_link')->nullable();
            $table->string('content_link_image')->nullable();
            $table->string('content_link_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
