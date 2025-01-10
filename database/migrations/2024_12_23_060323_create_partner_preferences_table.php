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
        Schema::create('partner_preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');

            $table->string('min_age')->nullable();
            $table->string('max_age')->nullable();
            $table->string('min_height')->nullable();
            $table->string('max_height')->nullable();

            $table->string('marital_status')->nullable();
            $table->string('special_case')->nullable();
            $table->string('body_type')->nullable();
            $table->string('weight')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('complexion')->nullable();
            $table->string('Features')->nullable();
            $table->string('education')->nullable();
            $table->string('working_as')->nullable();
            $table->string('income_range')->nullable();

            $table->string('diet')->nullable();
            $table->string('drink')->nullable();
            $table->string('smoke')->nullable();

            $table->string('religion')->nullable();
            $table->string('cast')->nullable();
            $table->string('mother_tongus')->nullable();
            $table->string('family_type')->nullable();
            $table->string('family_status')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();           
            $table->timestamps();

            $table->foreign('user_id')->references('custom_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_preferences');
    }
};
