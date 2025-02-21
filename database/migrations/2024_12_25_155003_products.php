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
        Schema::create('products' , function(Blueprint $table){
            $table->id('product_id');
            $table->string('img')->default('https://images.epagine.fr/852/9782756014852_1_75.jpg#images.titelive.com');
            $table->float('price')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('to_sell')->default(false) ;
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
