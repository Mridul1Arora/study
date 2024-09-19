<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('fields', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('field_name');
    //         $table->tinyInteger('module_id');
    //         $table->tinyInteger('field_type');
    //         $table->tinyInteger('status');

    //         $table->foreign('module_id')->references('id')->on('modules');
    //         $table->foreign('field_type')->references('id')->on('field_types');

    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('fields');
    // }
};
