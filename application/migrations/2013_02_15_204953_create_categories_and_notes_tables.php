<?php

class Create_Categories_And_Notes_Tables {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function($table)
		{
			$table->increments('id');
			$table->string('category');
			$table->timestamps();
		});

		Schema::create('notes', function($table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories')->on_update('cascade');
			$table->text('note');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
		Schema::drop('notes');
	}

}