<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbltransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltransaction', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('frame_id')->nullable()->default(0);
            $table->bigInteger('lensa_id')->nullable()->default(0);
            $table->string('name', 100);
            $table->string('age', 10);
            $table->text('address')->nullable()->default(null);
            $table->string('img_doc', 150)->nullable()->default(null);
            $table->integer('lensa_price')->unsigned()->nullable()->default(0);
            $table->integer('frame_price')->unsigned()->nullable()->default(0);
            $table->integer('grand_total')->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('tbltransaction');
    }
}
