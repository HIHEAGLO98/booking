<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("description");
            $table->string("adresse");
            $table->double("nombre_place");
            $table->date("datedebut");
            $table->date("datefin");
            $table->time("heuredebut");
            $table->time("heurefin");
            $table->timestamps();
             //contrainte de clé étrangère pour type d'événement
             $table->foreignId('type_evenement_id')
             ->constrained();
         //clé étrangère pour salle
         $table->foreignId('salle_id')
             ->constrained('salles')
             ->onUpdate('cascade')
             ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("evenements",function(Blueprint $table){
            $table->dropConstrainedForeignId("type_evenement_id");
            $table->dropConstrainedForeignId("salle_id");
        });
        Schema::dropIfExists('evenements');
    }
}
