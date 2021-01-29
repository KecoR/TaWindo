<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblframeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblframe', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->char('frame_type', 4);
            $table->text('description')->nullable();
            $table->integer('price')->unsigned()->nullable()->default(0);
            $table->string('image', 150);
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
        Schema::dropIfExists('tblframe');
    }
}
