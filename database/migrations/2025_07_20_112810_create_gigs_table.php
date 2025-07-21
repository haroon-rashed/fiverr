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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('category');
            $table->text('category_values')->nullable();
            $table->longText('description');
            $table->longText('faq');
            $table->decimal('base_price', 10, 2);
            $table->decimal('standard_price', 10, 2);
            $table->decimal('premium_price', 10, 2);
            $table->text('tags')->nullable();
            $table->string('images')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Add indexes for better performance
            $table->index('category');
            $table->index('user_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs');
    }
};