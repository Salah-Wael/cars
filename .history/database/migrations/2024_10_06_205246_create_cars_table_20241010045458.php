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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('car_model');
            $table->string('color');
            $table->string('plate')->nullable()->unique();
            $table->string('image');
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->enum('status', ['used', 'new', 'semi new']);
            $table->boolean('post_status');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
