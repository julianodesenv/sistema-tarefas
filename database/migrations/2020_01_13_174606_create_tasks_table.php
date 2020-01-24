<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTasksTable.
 */
class CreateTasksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('task_projects');
            $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->integer('action_id')->unsigned();
            $table->foreign('action_id')->references('id')->on('task_actions');
            $table->integer('priority_id')->unsigned();
            $table->foreign('priority_id')->references('id')->on('task_priorities');
            $table->integer('responsible_user_id')->unsigned();
            $table->foreign('responsible_user_id')->references('id')->on('users');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->text('conclusion')->nullable();
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
		Schema::drop('tasks');
	}
}
