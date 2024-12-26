<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('wallet_types', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->decimal('min_balance', 10, 2);
        $table->decimal('interest_rate', 5, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_types');
    }
};
