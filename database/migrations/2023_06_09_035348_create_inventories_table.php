<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string("province");
            $table->string("municipality");
            $table->string("barangay");
            $table->string("shoreline");
            $table->string("morphology");
            $table->string("typeStructure");
            $table->string("structureMaterial");
            $table->string("wavesStructure");
            $table->string("protectionToe");
            $table->string("heightStructure");
            $table->string("lengthStructure");
            $table->string("landwardsTypology");
            $table->string("shorelineTypology");
            $table->string("nearshoreTypology");
            $table->string('image')->nullable();
            $table->string("content");
            $table->double('latitude', 15, 8);
            $table->double('longitude', 15, 8);
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
        Schema::dropIfExists('inventories');
    }
}
