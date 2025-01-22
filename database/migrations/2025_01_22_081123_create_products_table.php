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
    { // https://laravel.com/docs/11.x/migrations#columns
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('article', length: 255)->unique();
            $table->string('name');
            $table->enum('status', ['available', 'unavailable']);
            $table->json('data');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
