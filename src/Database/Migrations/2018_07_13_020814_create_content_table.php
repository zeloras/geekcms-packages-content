<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->index();
            $table->string('lang', 10)->nullable()->index();
            $table->string('type')->index();
            $table->string('slug', 50)->nullable()->index();
            $table->integer('position')->default(0)->index();
            $table->boolean('status')->default(1)->index();
            $table->integer('created_by')->nullable()->default(null)->index();
            $table->integer('updated_by')->nullable()->default(null)->index();
            $table->integer('deleted_by')->nullable()->default(null)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('content');
    }
}
