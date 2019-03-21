<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaraokeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karaoke_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('normal_category_id')->nullable();
            $table->integer('super_category_id')->nullable();
            $table->string('title');
            $table->string('artist')->nullable();
            $table->string('code')->nullable();
            $table->string('cdgpath');
            $table->string('mp3path');
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
        Schema::dropIfExists('karaoke_lists');
    }
}
