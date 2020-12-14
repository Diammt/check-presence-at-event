<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignupStatutSummitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup_statut_summits', function (Blueprint $table) {
            $table->id();
            $table->boolean("presence")->default(false);
            $table->unsignedBigInteger('_sigup_id');
            $table->timestamps();
            $table->foreign('sigup_id')
                ->references('id')
                ->on('_signup');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signup_statut_summits');
    }
}
