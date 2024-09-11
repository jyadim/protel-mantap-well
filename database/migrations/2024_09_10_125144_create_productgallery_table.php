<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductgalleryTable extends Migration
{
    public function up()
    {
        Schema::create('productgallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id');
            $table->string('image');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('products_id')->references('id')->on('detail_products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productgallery');
    }
}
