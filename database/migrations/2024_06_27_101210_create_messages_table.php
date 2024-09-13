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
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->foreignId('recipient_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('content_title')->nullable();
            $table->string('content_link')->nullable();
            $table->string('content_link_image')->nullable();
            $table->longText('content_link_description')->nullable();
            $table->date('plan_date')->nullable();
            $table->time('plan_time')->nullable();
            $table->string('plan_meetup')->nullable();
            $table->string('plan_location')->nullable();
            $table->string('plan_notes')->nullable();
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
