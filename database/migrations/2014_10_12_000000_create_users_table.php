<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('utype')->default('USR')->comment("ADM for admins and USR for normal users");
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'ADMIN',
                'email' => 'admin@test.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin1234'),
                'utype' => 'ADM',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'USER',
                'email' => 'user@test.com',
                'password' => \Illuminate\Support\Facades\Hash::make('user1234'),
                'utype' => 'USR',
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
        Schema::dropIfExists('users');
    }
};
