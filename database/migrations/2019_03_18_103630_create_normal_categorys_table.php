<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('super_category_id');
            // $table->foreign('super_category_id')->references('id')->on('super_categorys')->onUpdate('cascade')->onDelete('cascade');
            $table->string('normal_category_name');
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
        Schema::dropIfExists('normal_categorys');
    }
}
