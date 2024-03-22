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
        Schema::create('jcp_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('jcp_id');
            $table->unsignedBiginteger('skill_id');
            $table->integer('user_rating')->default(0);
            $table->integer('supervisor_rating')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jcp_skill');
    }
};
