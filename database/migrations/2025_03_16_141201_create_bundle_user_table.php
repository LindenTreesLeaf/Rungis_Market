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
        Schema::create('bundle_user', function (Blueprint $table) {
            $table->primary(['bundle_id', 'user_id']);
            $table->foreignId('bundle_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table=dropForeign(['bundle_id', 'user_id']);
        Schema::dropIfExists('bundle_user');
    }
};
