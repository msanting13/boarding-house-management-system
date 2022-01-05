<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_houses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->longText('about');
            $table->string('address');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('telephone_no')->nullable();
            $table->string('brand_logo');
            $table->string('cover_photo')->nullable();
            $table->uuid('landlord_id');
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
        Schema::dropIfExists('boarding_houses');
    }
}
