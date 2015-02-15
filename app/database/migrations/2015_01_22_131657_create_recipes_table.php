<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('recipes', function(Blueprint $table){
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->string('title');
			$table->text('description');
			$table->unsignedInteger('serves');
			$table->unsignedInteger('prep_time');
			$table->unsignedInteger('cook_time');
			$table->string('image_url');
			$table->unsignedInteger('comment_count');
			$table->unsignedInteger('follow_count');
			$table->timestamps();
			$table->engine = 'MyISAM';
		});
		DB::statement('ALTER TABLE recipes ADD FULLTEXT search(title, description)');
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('recipes', function(Blueprint $table) {
			$table->drop();
		});
	}

}
