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
        Schema::create('type_swu', function (Blueprint $table) {
            $table->id();
            $table->string('image_recto');
            $table->string('image_verso');
            $table->string('nom');
            $table->string('sous_nom');
            $table->json('affinites');
            $table->json('types');
            $table->string('arene');
            $table->json('mot_cles');
            $table->integer('cout');
            $table->json('traits');
            $table->integer('puissance');
            $table->string('rarete');
            $table->integer('pv');
            $table->text('description_recto');
            $table->text('description_verso');
            $table->integer('up_puiss');
            $table->integer('up_pv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_swu');
    }
};
