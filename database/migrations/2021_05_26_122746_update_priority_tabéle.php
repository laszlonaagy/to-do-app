<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePriorityTabéle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prioritys', function (Blueprint $table) {
            $table->dropColumn('value');
        });

        Schema::table('prioritys', function($table) {
            $table->text('priority_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prioritys', function (Blueprint $table) {
            $table->text('value');
        });

        Schema::table('prioritys', function($table) {
            $table->dropColumn('priority_value');
        });
    }
}
