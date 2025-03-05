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
<<<<<<< HEAD
            $table->boolean("validated");
=======
            $table->timestamps();
>>>>>>> c06eb6a19ddcc5b74c81ffa22b3c3ae70183daa2
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundles');
    }
};
