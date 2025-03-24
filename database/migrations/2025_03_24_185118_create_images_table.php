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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string("description", length:50);
            $table->string("url", length:100);
            $table->timestamps();
        });

        Schema::create('bundle_image', function (Blueprint $table) {
            $table->primary(['bundle_id', 'image_id']);
            $table->foreignId('bundle_id')->constrained()->onDelete('cascade');
            $table->foreignId('image_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table=dropForeign(['bundle_id', 'order_id']);
        Schema::dropIfExists('bundle_order');
        Schema::dropIfExists('images');
    }
};
