<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Priority;

class AddPrioritiesToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Priority::create([
            'id' => '1',
            'name' => 'Very Low',
            'priority_value' => '1',
        ]);

        Priority::create([
            'id' => '2',
            'name' => 'Low',
            'priority_value' => '2',
        ]);

        Priority::create([
            'id' => '3',
            'name' => 'Medium',
            'priority_value' => '3',
        ]);

        Priority::create([
            'id' => '4',
            'name' => 'Mid-high',
            'priority_value' => '4',
        ]);

        Priority::create([
            'id' => '5',
            'name' => 'High',
            'priority_value' => '5',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('priorities');
    }
}
