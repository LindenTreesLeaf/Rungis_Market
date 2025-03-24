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
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->string("product", length:100);
            $table->integer("quantity");
            $table->float("price", precision:2);
            $table->boolean("validated");
            $table->timestamps();
        });

        Schema::table('bundles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('bundles', function (Blueprint $table) {
            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors');
        });

        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string("name_u", length:10);
            $table->timestamps();
        });

        Schema::table('bundles', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bundles', function (Blueprint $table) {
            $table->dropForeign(['unit_id']);
            $table->dropColumn('unit_id');
        });
        Schema::table('bundles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
        Schema::table('bundles', function (Blueprint $table) {
            $table->dropForeign(['sector_id']);
            $table->dropColumn('sector_id');
        });
        Schema::dropIfExists('bundles');
        Schema::dropIfExists('units');
    }
};
