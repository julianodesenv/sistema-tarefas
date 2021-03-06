<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTypeservicesTable.
 */
class CreateTypeservicesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('type_services', function(Blueprint $table) {
            $table->increments('id');
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
		Schema::drop('type_services');
	}
}
