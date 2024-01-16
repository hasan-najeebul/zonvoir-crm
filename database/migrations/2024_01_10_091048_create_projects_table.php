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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->text('project_description')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('customer_id');
            $table->integer('billing_type');
            $table->date('start_date');
            $table->date('deadline')->nullable();
            $table->date('project_created')->nullable();
            $table->datetime('date_finished')->nullable();
            $table->integer('progress')->nullable()->default(0);
            $table->integer('progress_from_tasks')->default(1);
            $table->decimal('project_cost', 15,2)->nullable();
            $table->decimal('project_rate_per_hour', 15,2)->nullable();
            $table->decimal('estimated_hours', 15,2)->nullable();
            $table->integer('added_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
