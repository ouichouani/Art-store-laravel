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
        Schema::table('commands' , function(Blueprint $table){

            $table->unsignedBigInteger('oner_id');
            $table->foreign('oner_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade') ;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commands', function(Blueprint $table){

            $table->dropForeign(['oner_id']);
            $table->dropColumn('oner_id');
            
            $table->dropForeign(['vendor_id']);
            $table->dropColumn('vendor_id');

            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');

        });

    }
};
