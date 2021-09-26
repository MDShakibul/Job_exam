<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SendFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_file', function (Blueprint $table) {
            $table->id();
            $table->string('position_type');
            $table->string('name');
            $table->string('application_type');
            $table->integer('application_price');
            $table->string('application_number');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('amount_land');
            $table->integer('nid_number');
            $table->string('pdf');
            $table->string('mobile_number');
            $table->string('description');
            $table->string('comment');
            $table->rememberToken();
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
        Schema::dropIfExists('send_file');
    }
}
