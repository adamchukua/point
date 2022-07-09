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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('type');
            $table->string('address');
            $table->string('city');
            $table->text('description');
            $table->boolean('food_with_own_kitchen')->default(false);
            $table->boolean('food_breakfast_is_included')->default(false);
            $table->boolean('food_restaurant')->default(false);
            $table->boolean('internet_free_wifi')->default(false);
            $table->boolean('internet_fixed')->default(false);
            $table->boolean('transport_free_parking')->default(false);
            $table->boolean('transport_paid_parking')->default(false);
            $table->boolean('transport_e_station')->default(false);
            $table->boolean('sports_leisure_fitness')->default(false);
            $table->boolean('sports_leisure_basin')->default(false);
            $table->boolean('sports_leisure_health_spa')->default(false);
            $table->boolean('other_pets_allowed')->default(false);
            $table->boolean('other_cleaning')->default(false);
            $table->boolean('other_facilities_for_people_with_disabilities')->default(false);
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
