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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obras_id')->constrained('obras')->cascadeOnDelete();

            $table->string('code')->nullable();

            $table->foreignId('obra_tipos_id')->constrained('obra_tipos')->cascadeOnDelete();

            $table->string('name')->nullable();
            $table->longText('description')->nullable();

            $table->string('phone')->nullable();
            $table->text('street_address')->nullable();
            $table->string('location')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();

            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
