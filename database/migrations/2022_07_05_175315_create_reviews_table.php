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
            $table->string('title');
            $table->text('review');
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->float('personnel_mark', 2, 2);
            $table->float('comfort_mark', 2, 2);
            $table->float('free_wifi_mark', 2, 2);
            $table->float('amenities_mark', 2, 2);
            $table->float('price_quality_mark', 2, 2);
            $table->float('purity_mark', 2, 2);
            $table->float('location_mark', 2, 2);
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
