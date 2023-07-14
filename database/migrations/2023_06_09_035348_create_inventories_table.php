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
            $table->string("coastalHazard");
            $table->string("shoreline");
            $table->string("morphology");
            $table->string("typeStructure");
            $table->string("structureMaterial");
            $table->string("wavesStructure");
            $table->string("protectionToe")->nullable();
            $table->string("heightStructure")->nullable();
            $table->string("lengthStructure")->nullable();
            $table->string("landwardsTypology")->nullable();
            $table->string("shorelineTypology")->nullable();
            $table->string("nearshoreTypology")->nullable();
            $table->string("armorUnits")->nullable();
            $table->string('image')->nullable();
            $table->string("description");
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
