<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonnepanelenExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonnepanelen_extras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id');
            $table->foreignId('location_id');
            $table->double('piekuur');
            $table->double('zonnepanelen');


            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("location_id")->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');

        });
        DB::table('zonnepanelen_extras')->insert(
            [
                'created_at' => now(),
                'user_id' => 1,
                'location_id' => 1,
                'piekuur' => 12,
                'zonnepanelen' => 4,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zonnepanelen_extras');
    }
}
