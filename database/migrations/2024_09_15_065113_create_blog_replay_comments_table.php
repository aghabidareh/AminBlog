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
        Schema::create('blog_replay_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->foreign('user_id')->refrences('id')->on('users')->onDelete('CASCADE');
            $table->bigInteger('comment_id')->nullable()->foreign('comment_id')->refrences('id')->on('blog_comments')->onDelete('CASCADE');
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_replay_comments');
    }
};
