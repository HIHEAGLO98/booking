<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            //$table->string("libelle_r");
            $table->timestamps();
            //contrainte de clé étrangère pour participant
            $table->foreignId('participant_id')
                ->constrained('participants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            //clé étrangère pour event
            $table->foreignId('evenement_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("reservations",function(Blueprint $table){
            $table->dropForeignId("user_id");
            $table->dropForeign("evenement_id");

        });
        Schema::dropIfExists('reservations');
    }
}
