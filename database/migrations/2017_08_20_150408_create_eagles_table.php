<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEaglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eagles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('EagleEye');
            $table->string('description');
            $table->string('placement');
            $table->enum('state', ['armed', 'disarmed', 'standby', 'off'])->default('disarmed');
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
        Schema::dropIfExists('eagles');
    }
}
