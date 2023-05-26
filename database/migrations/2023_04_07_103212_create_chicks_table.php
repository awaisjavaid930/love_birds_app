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
        Schema::create('chicks', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('parent_id');
            $table->string('title');
            $table->string('breed_no');
            $table->string('cage_no')->nullable();
            $table->string('ring_no')->nullable();
            $table->string('gender')->nullable();
            $table->integer('is_sold')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chicks');
    }
};
