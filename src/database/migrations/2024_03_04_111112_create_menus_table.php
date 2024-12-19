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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lnk', 500)->default("#")->comment('Ссылка');
            $table->string('title', 500)->comment('Анкор ссылки');
            $table->string('menu', 500)->default("Главное меню")->comment('Название меню');
            $table->integer('order')->default(0)->comment('Порядок вывода');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
