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
            $table->foreignId('visit_request_id')->constrained('visit_requests')->onDelete('cascade')->onUpdate('cascade'); // Links to 'requests'
            $table->string('unique_identifier')->unique();
            $table->integer('visitor_count')->default(1); 
            $table->timestamp('check_in_time')->nullable(); 
            $table->timestamp('check_out_time')->nullable(); 
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'canceled'])->default('scheduled'); 
            $table->timestamps();
            $table->softDeletes();
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
