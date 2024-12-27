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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visit_request_id')->constrained('visit_requests')->onDelete('cascade')->onUpdate('cascade'); // Links to 'requests'
            $table->string('event_type'); 
            $table->string('title'); 
            $table->dateTime('start'); 
            $table->dateTime('end'); 
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
        Schema::dropIfExists('calendars');
    }
};
