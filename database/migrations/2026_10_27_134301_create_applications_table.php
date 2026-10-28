<?php

declare(strict_types=1);

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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('reference_code', 32)->unique(); // Ex: BJ-ABRI-2026-0001
            
            // Candidate Data
            $table->string('candidacy_type', 64)->default('individual');
            $table->string('first_name', 120);
            $table->string('last_name', 120);
            $table->string('gender', 16);
            $table->date('date_of_birth');
            $table->string('nationality', 64)->default('Béninoise');
            $table->string('phone', 32);
            $table->string('email', 180);
            $table->string('profession', 120)->nullable();
            $table->string('organization', 180)->nullable();
            $table->string('department', 64)->nullable();
            $table->string('municipality', 64)->nullable();
            
            // Project & Form Data (structured JSON payload for all questionnaire fields)
            $table->string('invention_name', 255);
            $table->string('sector', 120);
            $table->text('summary')->nullable();
            $table->json('form_data'); // Detailed answers from applicant

            $table->timestamp('submitted_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
