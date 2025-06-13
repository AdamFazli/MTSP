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
        Schema::table('asnafs', function (Blueprint $table) {
            $table->bigInteger('income')->change();
            $table->bigInteger('expenses')->change();
        });
    }

    public function down()
    {
        Schema::table('asnafs', function (Blueprint $table) {
            $table->integer('income')->change(); // or original type
            $table->integer('expenses')->change();
        });
    }
};
