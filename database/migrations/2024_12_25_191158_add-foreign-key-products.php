<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     */
    public function up(): void
    {
        Schema::table('products' , function(Blueprint $table){

            $table->unsignedBigInteger('oner_id');
            $table->foreign('oner_id')->references('user_id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function(Blueprint $table){
            $table->dropForeign(['oner_id']);
            $table->dropColumn('oner_id');
        });
    }
};
