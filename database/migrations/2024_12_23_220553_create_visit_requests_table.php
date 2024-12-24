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
        Schema::create('visit_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('representative_id')->constrained('visitor_representatives')->onDelete('cascade'); // Links to 'visitor_representatives'
            $table->string('request_type'); // Type of request, e.g., "Guided Tour"
            $table->text('request_reason'); // Reason for the visit request
            $table->date('requested_date'); // Preferred date for the visit
            $table->integer('visitor_count')->default(1); // Number of visitors (1 for individual, >1 for groups)
            $table->string('status')->default('pending'); // Status: "pending", "approved", "rejected"
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
        Schema::dropIfExists('requests');
    }
};
