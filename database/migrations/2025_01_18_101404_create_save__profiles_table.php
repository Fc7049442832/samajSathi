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
        Schema::create('save_profiles', function (Blueprint $table) { // Adjusted table name to avoid double underscore
            $table->id();
            $table->string('user_id', 20);
            $table->string('save_profile_id', 20);
            $table->softDeletes(); // Adds the 'deleted_at' column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_profiles'); // Drops the entire table, no need to drop columns separately
    }
};
