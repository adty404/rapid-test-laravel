<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_result_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_result_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('rujukan')->nullable();
            $table->string('penanggung_jawab');
            $table->string('pemeriksa');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('test_result_detail');
    }
}
