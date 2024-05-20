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
        Schema::create('history_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('token_applicant');
            $table->bigInteger('approval_id');
            $table->string('flag');
            $table->string('status');
            $table->string('notes');
            $table->string('user_id');
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
        Schema::dropIfExists('history_approvals');
    }
};
