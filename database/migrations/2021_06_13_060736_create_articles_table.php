<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/* 
    dat migration:
    A mechanism for managing the creation and modification of DB table.

    'php artisan migrate'
    : Run all the files in the migrations folder.
*/

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    /* 
        The method will be run when we migrate.
    */
    public function up()
    {
        /* 
            create table named 'articles'
        */
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id'); // create auto increments integer
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /* 
        The method will be run when we rollback\
    */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
