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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('services_picture')->nullable();
            $table->string('services_title');
            $table->decimal('services_fee', 10, 2);
            $table->string('services_category');
            $table->longText('services_description');
            $table->timestamp('edited_at')->nullable();
            $table->timestamps();
        });

        Schema::create('services_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('services_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->longText('comment_content');
            $table->foreignId('parent_id')->nullable()->constrained('services_comments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('services_comments');
    }
};
