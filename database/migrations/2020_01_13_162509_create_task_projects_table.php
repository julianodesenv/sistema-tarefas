<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTaskProjectsTable.
 */
class CreateTaskProjectsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_projects', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('task_project_template_id')->unsigned()->nullable();
            $table->foreign('task_project_template_id')->references('id')->on('task_project_templates');
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('end_date_forecast');
            $table->text('description')->nullable();
            $table->enum('active', ['y', 'n'])->default('n');
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
		Schema::drop('task_projects');
	}
}
