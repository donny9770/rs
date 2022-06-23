<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
			$table->text('ktp');
			$table->text('nama');
			$table->text('kelamin');
			$table->date('tgllahir');
			$table->text('alamat');
			$table->text('nomorhp');
			$table->text('dokter');
			$table->text('keluhan');
			$table->text('penanganan');
			$table->text('biaya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunjungans');
    }
}
