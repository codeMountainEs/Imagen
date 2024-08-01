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
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\TrabajoTipo::class)->nullable();
            $table->foreignIdFor(\App\Models\User::class)->nullable();
            $table->foreignId('obra_id')->constrained('obras')->cascadeOnDelete();


            $table->string('code')->nullable();

            $table->string('name')->nullable();
            $table->longText('description')->nullable();

            $table->boolean('is_active')->default(true);

            $table->string('image')->nullable();

            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos');
    }
};
