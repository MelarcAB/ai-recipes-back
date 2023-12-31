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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('image')->nullable();
            //user_id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //text steps
            $table->text('steps')->nullable();
            //text ingredients
            $table->text('instructions')->nullable();
            //cantidades quantity
            $table->text('quantity')->nullable();
            //string

            /**
             * marc.arino
             * 20/08/2023
             * añado campos para guardar los filtros principales (tipo y dificultad)
             */
            $table->string('type')->nullable();
            $table->string('difficulty')->nullable();

            //slug
            $table->string('slug')->unique();
            //soft delete
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
