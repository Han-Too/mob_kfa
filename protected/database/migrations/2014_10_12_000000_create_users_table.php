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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('role_id');
            $table->string('image')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('pin')->nullable();
            $table->string('referal_code')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('merchant_id')->nullable();
            $table->string('status')->default('active');
            $table->string('bo_pin')->nullable();
            $table->string('bo_password')->nullable();
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
        Schema::dropIfExists('users');
    }
};
