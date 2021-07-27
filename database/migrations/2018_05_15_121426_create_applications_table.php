<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 60);
            $table->string('middle_name', 60)->nullable();
            $table->string('last_name', 60);
            $table->string('email', 100);
            $table->date('date_of_birth');
            $table->char('mobile_number', 10);
            $table->char('secondary_mobile', 10)->nullable();
            $table->string('address', 255);
            $table->string('highest_qualification', 255);
            $table->string('field_of_work', 255);
            $table->integer('company_of_interest');
            $table->string('best_match')->nullable();
            $table->integer('area_of_interest');
            $table->text('comments')->nullable();
            $table->string('cv_resume', 255);
            $table->string('support_docs1', 255)->nullable();
            $table->string('support_docs2', 255)->nullable();
            $table->string('support_docs3', 255)->nullable();
            $table->enum('status', ['not-hired', 'interviewed', 'hired', 'review', 'wait-list'])->default('review')->nullable();
            $table->text('additional_comments')->nullable();
            $table->text('hr_comments')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
