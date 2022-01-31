<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('set')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
                [
                    'name' => 'user1',
                    'email' => 'user1@gmail.com',
                    'password' => Hash::make('user1234'),
                    'created_at' => now(),
                    'email_verified_at' => now()
                ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
