<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('institution_id');
            $table->string('institution_name');
            $table->string('institution_email');
            $table->integer('institution_eiin');
            $table->longText('institution_description');
            $table->string('website');
            $table->string('contact_no');
            $table->string('institution_image');
            $table->tinyInteger('authority_status');
            $table->integer('survey_id');
            $table->tinyInteger('rating');
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
        Schema::dropIfExists('institutions');
    }
}
