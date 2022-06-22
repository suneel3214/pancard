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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullbale();
            $table->unsignedBigInteger('role_id')->nullbale();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('amount')->nullbale();
            $table->string('discount')->nullbale();
            $table->string('description')->nullbale();
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
        Schema::dropIfExists('packages');
        $table->dropForeign('role_id');
    }
};
