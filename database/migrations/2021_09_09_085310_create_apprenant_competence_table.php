<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprenantCompetenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("apprenant_competence", function(Blueprint $table) {
            $table->foreignId("apprenant_id")->constrained('apprenant')->onDelete("cascade");
            $table->foreignId('competence_id')->constrained('competence')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apprenant_competence');
    }
}
