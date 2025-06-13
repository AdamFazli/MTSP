<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('asnafs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ic')->unique();
            $table->string('gender');
            $table->date('dob');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('address');
            $table->string('photo')->nullable();
            $table->integer('household_size');
            $table->decimal('income', 10, 2);
            $table->decimal('expenses', 10, 2);
            $table->string('job_status');
            $table->text('assets')->nullable();
            $table->text('debts')->nullable();
            $table->string('category');
            $table->string('status');
            $table->string('documents')->nullable();
            $table->text('notes')->nullable();
            $table->string('officer')->nullable();
            $table->text('remarks')->nullable();
            $table->text('follow_up')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asnafs');
    }
};
