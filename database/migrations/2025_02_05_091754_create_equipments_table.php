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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string("name", length:50);
            $table->date("last_revision");
            $table->date("next_revision");
            $table->timestamps();
        });

        Schema::table('equipments', function (Blueprint $table) {
            $table->unsignedBigInteger('building_id');
            $table->foreign('building_id')->references('id')->on('buildings');
        });

        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->string("name", length:50);
            $table->timestamps();
        });

        Schema::table('equipments', function (Blueprint $table) {
            $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id')->references('id')->on('conditions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropForeign(['condition_id']);
            $table->dropColumn('condition_id');
        });
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropForeign(['building_id']);
            $table->dropColumn('building_id');
        });
        Schema::dropIfExists('equipments');
        Schema::dropIfExists('conditions');
    }
};
