<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDicAttachedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dic_attached_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('file_path');
            $table->text('file_name')->nullable();
            $table->text('file_type')->nullable();
            $table->bigInteger('dic_entity_id')->unsigned();
            $table->foreign('dic_entity_id')->references('id')->on('dictionaries');
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
        Schema::dropIfExists('dic_attached_files');
    }
}
