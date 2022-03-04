<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrgPeopleTable extends Migration
{
    public function up()
    {
        Schema::create('drg_people', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru')->nullable();
            $table->string('name_lt')->nullable();
            $table->string('date_of_birthday')->nullable();

            $table->string('passport')->nullable();
            $table->string('passport_id')->nullable();
            $table->string('photo')->nullable();
            $table->text('address')->nullable();
            $table->jsonb('phones')->nullable();

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drg_people');
    }
}
