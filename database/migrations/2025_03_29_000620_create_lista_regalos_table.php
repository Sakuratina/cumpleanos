<?php

use App\Models\ListaRegalo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lista_regalos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });


        Schema::create('regalos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('url')->nullable();
            $table->string('foto')->nullable();
            $table->foreignIdFor(ListaRegalo::class);
            $table->foreignIdFor(\App\Models\User::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_regalos');
        Schema::dropIfExists('regalos');
    }
};
