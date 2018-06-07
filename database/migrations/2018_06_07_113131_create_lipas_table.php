<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLipasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lipas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount');
            $table->string('phone');
            $table->string('status')->default(0);
            $table->string('ip');
            $table->longtext('bowserAgent');
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
        Schema::dropIfExists('lipas');
    }
}
