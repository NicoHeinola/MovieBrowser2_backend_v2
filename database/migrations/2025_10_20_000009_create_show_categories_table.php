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
        if (!Schema::hasTable('show_categories')) {
            Schema::create('show_categories', function (Blueprint $table) {
                $table->id()->index();
                $table->foreignId('show_id')->constrained('shows')->onDelete('cascade');
                $table->string('name');
                $table->unique(['show_id', 'name'], 'uq_show_category');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_categories');
    }
};
