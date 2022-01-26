<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winsts', function (Blueprint $table) {
            $table->id();
            $table->float('winst');
            $table->timestamps();
        });
        DB::table('winsts')->insert(
            [
                ['winst' => 356.21],
                ['winst' => 420.69],
                ['winst' => 11.36]
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
        Schema::dropIfExists('winsts');
    }
}
