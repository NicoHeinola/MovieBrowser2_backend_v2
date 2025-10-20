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
        Schema::create('website_tags', function (Blueprint $table) {
            $table->id()->index();
            $table->foreignId('website_id')->constrained('websites')->onDelete('cascade');
            $table->string('name');
            $table->unique(['website_id', 'name'], 'uq_website_tag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_tags');
    }
};