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
            $table->string('name')->nullable(false);
            $table->string('slug')->nullable(false);
            $table->decimal('price', 10, 2)->nullable(false);
            $table->decimal('weight', 8, 3)->nullable(false);
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['new','dalivered','cancelled','visible'])->nullable(false)->default('new');
            $table->timestamps();
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
