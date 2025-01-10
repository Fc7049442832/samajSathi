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
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('profile_image')->nullable();
            
            // About Me
            $table->text('about_me')->nullable();

            // Basic Info
            $table->date('dob')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('immigration')->nullable();
            $table->string('special_case')->nullable();
            $table->string('status')->nullable();
            $table->string('body_type')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('complexion')->nullable();
            $table->string('features')->nullable();

            // Lifestyle
            $table->string('living_situation')->nullable();
            $table->string('house_ownership')->nullable();
            $table->string('diet')->nullable();
            $table->string('drink')->nullable();
            $table->string('smoke')->nullable();

            // Religious Background
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('sub_caste')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('gothra')->nullable();

             // Family Details
             $table->string('father_status')->nullable();
             $table->string('mother_status')->nullable();
             $table->integer('total_sister')->nullable();
             $table->integer('total_brother')->nullable();
             $table->string('family_type')->nullable();
             $table->string('family_values')->nullable();
             $table->string('family_status')->nullable();
             $table->string('native_place')->nullable();
 
             // Education
             $table->string('education')->nullable();
             $table->string('working_as')->nullable();
             $table->string('working_with')->nullable();
             $table->string('income')->nullable();

             // Location of Groom
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('user_id')->references('custom_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
