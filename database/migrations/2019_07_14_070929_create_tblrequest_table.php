<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblrequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblrequest', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('knowledge_parent_id')->nullable();
            $table->string('knowledge_parent_name')->nullable();
            $table->integer('knowledge_child_id')->nullable();
            $table->string('knowledge_child_name')->nullable();
            $table->string('info_name');
            $table->text('content');
            $table->dateTime('tgl_request');
            $table->dateTime('tgl_accept');
            $table->string('status');
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
        Schema::dropIfExists('tblrequest');
    }
}
