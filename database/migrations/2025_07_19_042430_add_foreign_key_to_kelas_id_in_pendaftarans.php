<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('pendaftarans', function (Blueprint $table) {
        $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('pendaftarans', function (Blueprint $table) {
        $table->dropForeign(['kelas_id']);
    });
}

};
