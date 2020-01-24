<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTaskProjectTemplatesTable.
 */
class CreateTaskProjectTemplatesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_project_templates', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('task_project_template_id')->unsigned()->nullable();
            $table->foreign('task_project_template_id')->references('id')->on('task_project_templates');
            $table->string('name');
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
		Schema::drop('task_project_templates');
	}
}
