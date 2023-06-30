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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('name');
            $table->text('description');
            $table->foreignId('vendor_id')->constrained()->onDelete('cascade');
            $table->foreignId('childcategory_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('sku')->unique();
            $table->integer('qty');
            $table->double('price');
            $table->double('offer_price')->nullable();
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();
            $table->boolean('is_top')->default(0);
            $table->boolean('is_best')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->enum('is_approved',['yes','pending','no'])->default('pending');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
