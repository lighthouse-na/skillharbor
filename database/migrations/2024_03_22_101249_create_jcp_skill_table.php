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
        Schema::table('jcp_skill', function (Blueprint $table) {
            // Add foreign key relationships to the jcp and skill tables
            $table->foreign('jcp_id')->references('id')->on('jcps')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jcp_skill', function (Blueprint $table) {
            // Drop foreign key relationships if rollback is needed
            $table->dropForeign(['jcp_id']);
            $table->dropForeign(['skill_id']);
        });
    }
};
