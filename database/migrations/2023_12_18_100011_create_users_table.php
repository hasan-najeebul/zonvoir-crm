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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->string('employee_id')->unique()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('contact_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('personal_email')->nullable();
            $table->date('doj')->nullable();
            $table->decimal('hourly_rate',10,2)->nullable();
            $table->double('monthly_salary')->nullable();
            $table->date('notice_period_start_date')->nullable();
            $table->date('last_working_date')->nullable();
            $table->string('skype_id')->nullable();
            $table->string('slack_id')->nullable();
            $table->text('email_signature')->nullable();
            $table->string('status')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->unsignedBigInteger('employee_type_id')->nullable();
            $table->foreign('employee_type_id')->references('id')->on('employee_types')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('resignation_status_id')->nullable();
            $table->foreign('resignation_status_id')->references('id')->on('resignation_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
