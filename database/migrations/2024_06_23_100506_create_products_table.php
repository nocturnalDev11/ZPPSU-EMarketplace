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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('prod_picture')->nullable();
            $table->string('prod_name');
            $table->decimal('prod_price', 10, 2);
            $table->string('prod_category');
            $table->string('prod_condition');
            $table->longText('prod_description');
            $table->timestamp('edited_at')->nullable();
            $table->timestamps();
        });

        Schema::create('prod_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prod_id')->constrained('products')->onDelete('cascade'); // Ensure this matches
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->longText('comment_content');
            $table->foreignId('parent_id')->nullable()->constrained('prod_comments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_comments');
        Schema::dropIfExists('products');
    }
};
