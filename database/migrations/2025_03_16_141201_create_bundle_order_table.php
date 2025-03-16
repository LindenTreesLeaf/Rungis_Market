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
        Schema::create('bundle_order', function (Blueprint $table) {
            $table->primary(['bundle_id', 'order_id']);
            $table->foreignId('bundle_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table=dropForeign(['bundle_id', 'order_id']);
        Schema::dropIfExists('bundle_order');
    }
};
