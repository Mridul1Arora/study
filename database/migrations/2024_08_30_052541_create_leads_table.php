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
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_name');
            $table->string('email');
            $table->string('lead_source')->nullable();
            $table->string('lead_owner');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('salutation')->nullable();
            $table->string('mobile')->nullable();
            $table->string('lead_status')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamp('created_time')->nullable();
            $table->timestamp('modified_time')->nullable();
            $table->string('secondary_email')->nullable();
            $table->timestamp('last_activity_time')->nullable();
            $table->timestamp('lead_conversion_time')->nullable();
            $table->unsignedBigInteger('converted_account')->nullable();
            $table->unsignedBigInteger('converted_contact')->nullable();
            $table->unsignedBigInteger('converted_deal')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('leads');
    }
};
