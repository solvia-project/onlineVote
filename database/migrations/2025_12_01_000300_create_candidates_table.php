<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id')->constrained('elections')->cascadeOnDelete();
            $table->foreignId('position_id')->constrained('positions')->cascadeOnDelete();
            $table->string('name');
            $table->text('bio')->nullable();
            $table->timestamps();
            $table->unique(['position_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};

