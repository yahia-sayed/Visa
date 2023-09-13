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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('otp_code')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('country_of_residency')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('place_of_issue')->nullable();
            $table->date('arrival_date')->nullable();
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->integer('visa_duration')->nullable();
            $table->string('visa_status')->nullable();
            $table->string('passport_pic')->nullable();
            $table->string('personal_pic')->nullable();
            $table->foreignId('companion_id')->nullable()->constrained()->onDelete('set null')->onUpdate('set null');
            $table->foreignId('accommodation_id')->nullable()->constrained()->onDelete('set null')->onUpdate('set null');
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
        Schema::dropIfExists('guests');
    }
};
