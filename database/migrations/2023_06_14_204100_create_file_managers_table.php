<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('file_managers', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->string('file_name');
        $table->string('file_path');
        $table->string('file_type');
        $table->integer('file_size');
        $table->text('file_description')->nullable();
        $table->unsignedBigInteger('uploaded_by')->nullable();
        $table->foreign('uploaded_by')->references('id')->on('users');
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
        Schema::dropIfExists('file_managers');
    }
}
