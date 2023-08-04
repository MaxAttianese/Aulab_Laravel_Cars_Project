<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_extra', function (Blueprint $table) {
            $table->primary(["car_id", "extra_id"]);
            $table->unsignedBigInteger("car_id");
            $table->unsignedBigInteger("extra_id");

            $table->foreign("car_id")->references("id")->on("cars");
            $table->foreign("extra_id")->references("id")->on("extras");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_extra');
    }
};
