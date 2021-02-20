<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->integer('register_no')->unique()->default(0);
            $table->integer('ration_no')->unique()->default(0);
            $table->date('date');

            $table->string('door_no')->nullable();
            $table->string('sub_locality')->nullable();
            $table->string('sub_locality2')->nullable();
            $table->integer('ward_no')->nullable();
            $table->string('location')->nullable();
            $table->integer('pin_code')->nullable();
            $table->string('police_station')->nullable();
            $table->string('post_office')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('state')->nullable();
            $table->string('gender')->nullable();

            $table->string('family_head')->nullable();
            $table->string('appellation')->nullable();
            $table->string('suffix')->nullable();
            $table->integer('residing_period')->nullable();


            $table->bigInteger('monthly_income')->nullable();
            $table->date('dob')->nullable();
            $table->string('relationship')->nullable();
            $table->string('family_members')->nullable();
            $table->string('family_ages')->nullable();

            $table->string('occupation')->nullable();
            $table->string('electricity')->nullable();
            $table->string('gas')->nullable();
            $table->string('religion')->nullable();

            $table->string('email')->unique()->default(0);
            $table->biginteger('phone')->unique()->nullable();

            $table->integer('documents')->nullable();
            $table->integer('note_sheet_no')->nullable();
            $table->text('note_sheet')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
