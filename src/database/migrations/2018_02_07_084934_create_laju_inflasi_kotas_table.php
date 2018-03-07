<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLajuInflasiKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('laju_inflasi_kotas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('label', 255);
			$table->string('description', 255)->nullable();
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
		Schema::drop('laju_inflasi_kotas');
	}
}
