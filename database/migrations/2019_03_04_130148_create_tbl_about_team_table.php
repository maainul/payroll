<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAboutTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_about_team', function (Blueprint $table) {
            $table->increments('aboutteam_id');
            $table->string('team_name');
            $table->string('team_designation');
            $table->string('team_photo');
            $table->string('about_title');
            $table->string('about_description');
            $table->string('about_message');
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
        Schema::dropIfExists('tbl_about_team');
    }
}
