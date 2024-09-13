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
        Schema::create('call_logs', function (Blueprint $table) {
            $table->id()->comment('Auto increment primary key'); // id (auto increment primary not null)
            $table->integer('call_to')->index()->comment('Contacted person'); // call_to (int not null indexed)
            $table->integer('call_from')->index()->comment('Counsellor user ID'); // call_from (int not null indexed)
            $table->tinyInteger('call_type')->comment('1-inbound, 2-outbound, 3-missed'); // call_type (tinyint not null)
            $table->dateTime('date_time')->comment('Date and time of the call'); // date_time (proper date and time input)
            $table->time('time_duration')->comment('Duration of the call (HH:MM:SS)'); // time_duration (time datatype)
            $table->tinyInteger('call_purpose')->comment('1-L1, 2-L2'); // call_purpose (tinyint not null)
            $table->string('call_agenda', 50)->nullable()->comment('Call agenda'); // call_agenda (varchar 50)
            $table->tinyInteger('call_result')->comment('1-Connected, 2-Not Answered, 3-Call Back, 4-Wrong Number'); // call_result (tinyint not null)
            $table->string('description', 100)->nullable()->comment('Description of the call'); // description (varchar 100)
            $table->string('call_status', 20)->default('completed')->comment('Completed or not completed'); // call_status (varchar)
            $table->timestamps(); // created_at and updated_at (timestamps)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_logs');
    }
};
