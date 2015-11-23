<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterImageColums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	Schema::table('images', function($table)
	{
   	 $table->integer('user_id');
	$table->dropColumn('password');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
	Schema::table('images', function($table)
	{
   	 $table->string('password');
	$table->dropColumn('user_id');
	});
    }
}
