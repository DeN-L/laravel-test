<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert
        DB::table('users')->insert(
            array(
                'name' => 'Jack Doe',
                'email' => 'jack-doe@milo.ru',
                'password' => '$2y$10$CKk6g2KXP88eunuzBW3MJuOf82JROMHy1ubXWPwVA6Y9csUjCLbem', // 11111111
                'created_at' => '2020-05-09 10:00:00',
                'updated_at' => '2020-05-09 10:00:00'
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
}
