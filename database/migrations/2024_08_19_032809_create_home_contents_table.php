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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->bigInteger('header_id');
            $table->string('product_title');
            $table->bigInteger('product_id');
            $table->bigInteger('quickAccess_id');
            $table->text('quickAccess_description');
            $table->string('link');
            $table->text('link_description');
            $table->bigInteger('author_id');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
