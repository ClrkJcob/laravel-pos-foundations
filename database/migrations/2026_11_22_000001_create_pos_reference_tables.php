<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 30)->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
        });

        Schema::create('pos_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pos_users');
        Schema::dropIfExists('customers');
    }
};
