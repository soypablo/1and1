<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable()->comment('用户头像');
            $table->string('introduction')->nullable();
            $table->timestamp('last_actived_at')->nullable();
            $table->string('weixin_openid')->unique()->nullable();
            $table->string('weixin_unionid')->unique()->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
