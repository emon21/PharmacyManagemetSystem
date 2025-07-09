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
        Schema::create('medicine_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');

            // Assuming you have a medicines table with an id column
            // If not, you can create a medicines table first
           
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');

            $table->string('batch_id')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('quantity')->default(0);
            $table->string('mrp')->nullable();
            $table->string('rate')->nullable();

           // $table->decimal('purchase_price', 10, 2)->nullable();
           // $table->decimal('selling_price', 10, 2)->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_stocks');
    }
};
