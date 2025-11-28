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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('position_id');
            $table->bigInteger('bank_id');
            $table->string('phone')->nullable();
            $table->string('account_number')->nullable();
            $table->decimal('salary_base', 12, 2)->default(0);
            $table->string('salary_period')->default('monthly'); 
            $table->decimal('meal_allowance', 12, 2)->default(0);
            $table->decimal('meal_allowance_holiday', 12, 2)->default(0);
            $table->bigInteger('shift_id')->nullable();
            $table->decimal('overtime_rate', 12, 2)->default(0);
            $table->decimal('overtime_rate_holiday', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
 