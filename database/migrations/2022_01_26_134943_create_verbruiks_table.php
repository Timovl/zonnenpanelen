<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerbruiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbruiks', function (Blueprint $table) {
            $table->id();
            $table->float('verbruik');
            $table->timestamps();
        });
        DB::table('verbruiks')->insert(
            [
                ['verbruik' => 555.333],
                ['verbruik' => 254],
                ['verbruik' => 1084]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verbruiks');
    }
}
