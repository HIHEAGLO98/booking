<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementOrganisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenement__organisateur', function (Blueprint $table) {   
          //clé étrangère pour event
             $table->foreignId('evenement_id')
             ->constrained('evenements')
             ->onUpdate('cascade')
             ->onDelete('cascade');

         //clé étrangère pour organisateur
         $table->foreignId('organisateur_id')
             ->constrained('organisateurs')
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
        Schema::dropIfExists('_evenement__organisateur');
    }
}
