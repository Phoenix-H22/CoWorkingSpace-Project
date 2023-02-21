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
        Schema::create('generated_ids', function (Blueprint $table) {
            $table->id();
            $table->string('generated_id')->unique();
            $table->string('type')->default('card');
            $table->string('status')->default('active');
            $table->bigInteger('used_by')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('used_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generated_ids');
    }
};
