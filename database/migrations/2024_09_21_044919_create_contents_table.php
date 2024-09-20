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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('sub_desc')->nullable();
            $table->unsignedBigInteger('galleries_id')->nullable();
            $table->foreign('galleries_id')->references('id')->on('galleries');
            $table->string('feature_image')->nullable();
            $table->unsignedBigInteger('post_types_id')->nullable();
            $table->foreign('post_types_id')->references('id')->on('post_types');
            $table->boolean('is_featureNotice')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
