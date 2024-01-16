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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 65)->nullable();
            $table->string('name', 191)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('company', 191)->nullable();
            $table->text('description')->nullable();
            $table->integer('country')->nullable()->default(0);
            $table->string('zip', 15)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('assigned')->nullable()->default(0);
            $table->dateTime('dateadded')->nullable();
            $table->integer('from_form_id')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
            $table->integer('source')->nullable()->default(0);
            $table->dateTime('dateassigned')->nullable();
            $table->dateTime('last_status_change')->nullable();
            $table->integer('addedfrom')->nullable()->default(0);
            $table->string('email', 100)->nullable()->unique();
            $table->string('website', 150)->nullable();
            $table->integer('leadorder')->nullable()->default(1);
            $table->string('phonenumber', 50)->nullable();
            $table->dateTime('date_converted')->nullable();
            $table->tinyInteger('lost')->nullable()->default(0);
            $table->integer('junk')->nullable()->default(0);
            $table->integer('last_lead_status')->nullable()->default(0);
            $table->tinyInteger('is_imported_from_email_integration')->nullable()->default(0);
            $table->string('email_integration_uid', 30)->nullable();
            $table->tinyInteger('is_public')->nullable()->default(0);
            $table->string('default_language', 40)->nullable();
            $table->integer('client_id')->nullable()->default(0);
            $table->decimal('lead_value', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
