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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('booking_id');
            $table->string('title')->nullable();
            $table->text('text');
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->tinyInteger('personnel_mark');
            $table->tinyInteger('comfort_mark');
            $table->tinyInteger('free_wifi_mark');
            $table->tinyInteger('amenities_mark');
            $table->tinyInteger('price_quality_mark');
            $table->tinyInteger('purity_mark');
            $table->tinyInteger('location_mark');
            $table->tinyInteger('stars');
            $table->timestamps();

            $table->index('profile_id');
            $table->index('hotel_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
