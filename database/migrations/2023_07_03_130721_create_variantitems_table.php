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
        Schema::create('variantitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productvariant_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->double('price');
            $table->unsignedInteger('qty');
            $table->enum('status',['active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variantitems');
    }
};
