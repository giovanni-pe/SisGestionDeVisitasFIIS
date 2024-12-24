<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visit_request_id')->constrained('visit_requests')->onDelete('cascade'); // Links to 'requests'
            $table->string('unique_identifier')->unique(); // Unique identifier for the visit (QR code or PIN)
            $table->integer('visitor_count')->default(1); // Number of visitors
            $table->timestamp('check_in_time')->nullable(); // Check-in timestamp
            $table->timestamp('check_out_time')->nullable(); // Check-out timestamp
            $table->string('status')->default('scheduled'); // Status: "scheduled", "completed", etc.
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
};
