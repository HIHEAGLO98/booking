<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string("path");
            $table->timestamps();
            $table->foreignId('evenement_id')
            ->constrained('evenements')
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
        Schema::table("images",function(Blueprint $table){
            $table->dropConstrainedForeignId("evenement_id");
           // $table->dropConstrainedForeignId("evenement_id");
        });
        Schema::dropIfExists('images');
    }
}
