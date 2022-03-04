<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrgCarsTable extends Migration
{
    public function up()
    {
        Schema::create('drg_cars', function (Blueprint $table) {
            $table->id();

            $table->string('number')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drg_cars');
    }
}
