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
        Schema::create('description_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->constrained('detail_products')->onDelete('cascade');
            $table->string('title');
            $table->text('desc');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('description_points');
    }
};