<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTaskTimesTable.
 */
class CreateTaskTimesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_times', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('task_user_id')->unsigned();
            $table->foreign('task_user_id')->references('id')->on('task_users')->onDelete('cascade');
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['play', 'pause', 'finish'])->default('play');
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
		Schema::drop('task_times');
	}
}
