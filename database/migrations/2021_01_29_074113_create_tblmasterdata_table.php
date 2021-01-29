<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblmasterdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmasterdata', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable()->default(null);
            $table->mediumText('address')->nullable()->default(null);
            $table->string('whatsapp', 100)->nullable()->default(null);
            $table->string('instagram', 100)->nullable()->default(null);
            $table->string('facebook', 100)->nullable()->default(null);
            $table->string('bank', 100)->nullable()->default(null);
            $table->string('no_rek', 100)->nullable()->default(null);
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
        Schema::dropIfExists('tblmasterdata');
    }
}
