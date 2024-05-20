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
        Schema::create('merchant_documents', function (Blueprint $table) {
            $table->id();
            $table->string('token_applicant');
            $table->bigInteger('document_id');
            $table->bigInteger('layer_id')->nullable();
            $table->string('image')->nullable();
            $table->string('status_approval')->nullable();
            $table->string('notes')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('merchant_documents');
    }
};
