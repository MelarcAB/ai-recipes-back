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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_es')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable();
            //ingredient_type_id
            $table->unsignedBigInteger('ingredient_type_id');
            $table->string('unit')->nullable();
            $table->string('unit_size')->nullable();

            $table->string('slug')->unique();

            $table->timestamps();
            //soft delete
            $table->softDeletes();


            //ingredient_type_id
            $table->foreign('ingredient_type_id')->references('id')->on('ingredient_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
