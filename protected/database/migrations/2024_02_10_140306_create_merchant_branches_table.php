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
        Schema::create('merchant_branches', function (Blueprint $table) {
            $table->id();
            $table->string('token_applicant');
            $table->text('alamat');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('layer_id')->nullable();
            $table->string('kebutuhan_edc')->nullable();
            $table->string('status')->nullable();
            $table->string('internal_status')->nullable();
            $table->string('notes')->nullable();
            $table->bigInteger('update_by')->nullable();
            $table->string('alamat_pengiriman')->nullable();
            $table->string('nama_pic')->nullable();
            $table->string('no_tlp_pic')->nullable();
            $table->string('tipe')->nullable();
            $table->string('nomor_seri')->nullable();
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
        Schema::dropIfExists('merchant_branches');
    }
};
