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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('position_in_company')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('contact_number')->nullable();
            $table->tinyInteger('primary_contact')->default('0');
            $table->string('password')->nullable();
            $table->tinyInteger('invoice_emails')->default('0');
            $table->tinyInteger('estimate_emails')->default('0');
            $table->tinyInteger('credit_note_emails')->default('0');
            $table->tinyInteger('support_ticket_emails')->default('0');
            $table->tinyInteger('project_emails')->default('0');
            $table->tinyInteger('contract_emails')->default('0');
            $table->tinyInteger('task_emails')->default('0');
            $table->tinyInteger('proposal_emails')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
