<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("minigroupes", function(Blueprint $table) {
            $table->id();
            $table->integer("sessionid");
        });
        Schema::create("minigroupes_apprenant", function(Blueprint $table) {
            $table->foreignId("idiminigroupe")->constrained('minigroupes');
            $table->foreignId("idapprenant")->constrained('apprenant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mini_groupes');
        Schema::dropIfExists('minigroupes_apprenant');
    }
}
