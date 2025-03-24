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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('name', length:50);
            $table->float('latitude',precision:4);
            $table->float('longitude',precision:4);
            $table->timestamps();
        });

        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string("name", length:50);
            $table->timestamps();
        });

        Schema::table('places', function (Blueprint $table) {
            $table->unsignedBigInteger('building_id');
            $table->foreign('building_id')->references('id')->on('buildings');
        });

        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string("name", length:50);
            $table->timestamps();
        });

        Schema::table('buildings', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
        });

        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->string('name', length:50);
            $table->timestamps();
        });

        Schema::table('buildings', function (Blueprint $table) {
            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places', function (Blueprint $table) {
            $table->dropForeign(['building_id']);
            $table->dropColumn('building_id');
        });
        Schema::table('buildings', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropColumn('type_id');
        });
        Schema::table('buildings', function (Blueprint $table) {
            $table->dropForeign(['sector_id']);
            $table->dropColumn('sector_id');
        });
        Schema::dropIfExists('buildings');
        Schema::dropIfExists('places');
        Schema::dropIfExists('types');
        Schema::dropIfExists('sectors');
    }
};
