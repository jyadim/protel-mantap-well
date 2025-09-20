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
    Schema::create('pdf_ref', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('reference_id'); // Ensure this line exists
        $table->string('pdf_path');
        $table->string('pdf_title');
        $table->timestamps();

        // Set the foreign key constraint
        $table->foreign('reference_id')->references('id')->on('references')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
