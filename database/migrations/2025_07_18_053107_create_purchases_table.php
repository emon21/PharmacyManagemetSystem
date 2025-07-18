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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('invoice_id');
            $table->string('voucher_number');
            $table->date('purchase_date');
            $table->decimal('total_amount');
            $table->tinyInteger('payment_status')->default(1)->comment('1 -> pending,2-> Accept,3 -> Cancel');
            $table->timestamps();

            # Relationship
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');

            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
