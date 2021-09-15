<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('application_type');
            $table->integer('application_price');
            $table->string('application_number');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('amount_land');
            $table->integer('nid_number');
            $table->string('image');
            $table->string('pdf');
            $table->string('file');
            $table->string('mobile_number');
            $table->string('description');
            $table->integer('is_verified')->default(0);
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
        Schema::dropIfExists('user_details');
    }
}
