<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable2 extends Migration
{
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cd_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id');
            $table->string('college_id')->nullable();
            $table->string('campus_location')->nullable();
            $table->string('city_id')->nullable();
            $table->string('city_2')->nullable();
            $table->text('desc')->nullable();
            $table->string('university_owner')->nullable();
            $table->string('modified_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('universities');
    }
}
