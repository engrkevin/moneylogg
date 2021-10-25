<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true); // true=オートインクリメント
            $table->string('title'); // タイトル
            $table->date('buy_date'); // 購入日
            $table->integer('amount'); // 金額
            $table->longText('content'); // メモ
            $table->unsignedBigInteger('user_id'); // ユーザーid
            $table->softDeletes(); // 削除
            // 更新日
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            // 作成日
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
