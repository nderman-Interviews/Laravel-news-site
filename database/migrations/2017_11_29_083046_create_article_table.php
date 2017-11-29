<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('author_id') -> unsigned() -> default(0);
            $table->foreign('author_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->string('title')->unique();
            $table->text('body');
            $table->string('snippet_text')->unique();
            $table->boolean('live');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
