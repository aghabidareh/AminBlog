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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->foreign('user_id')->refrences('id')->on('users')->onDelete('CASCADE');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('category_id')->nullable()->foreign('category_id')->refrences('id')->on('categories')->onDelete('CASCADE');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('is_publish')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
