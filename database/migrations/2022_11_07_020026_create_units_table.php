<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('unit_id');
            $table->string('unit_name', 25);
            //$table->timestamps();
        });

        // добавление единиц измерения (не успел разобраться с сидингом)
        DB::table('units')->insert(
            array(
                'unit_name' => 'шт. '
            )
        );
        DB::table('units')->insert(
            array(
                'unit_name' => 'кг. '
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
