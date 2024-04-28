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
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->enum('insurance_menu', ['بیمه شخص ثالث', 'بیمه بدنه', 'بیمه عمر', 'بیمه آتش سوزی', 'بیمه تامین اجتماعی', 'بیمه حوادث', 'بیمه مسیولیت', 'بیمه موتورسیکلت', 'بیمه سلامت', 'بیمه حمل و نقل'])->default(null);
            $table->text('description')->nullable();
            $table->dateTime('due_date');
            $table->enum('payment_period', ['هر ماه', 'هر سه ماه', 'هر شش ماه', 'سالیانه', 'تکرار نشود'])->default(null);
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
