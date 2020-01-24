<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateScheduleUsersTable.
 */
class CreateScheduleUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('model_projects', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('model_projects')->onDelete('cascade');
            $table->string('name');
            $table->enum('active', ['y','n'])->default('n');
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('model_projects');
	}
}
