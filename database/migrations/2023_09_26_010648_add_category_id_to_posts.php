<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Добавляем поле category_id
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories'); // Создаем внешний ключ
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Удаляем поле category_id при откате миграции
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};