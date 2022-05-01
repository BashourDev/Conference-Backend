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
        Schema::create('invitation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('degree')->nullable();
            $table->string('job')->nullable();
            $table->string('occupation');
            $table->string('institution');
            $table->string('country');
            $table->string('email');
            $table->string('category');
            $table->string('presentation');
            $table->string('telephone');
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
        Schema::dropIfExists('invitation_requests');
    }
};
