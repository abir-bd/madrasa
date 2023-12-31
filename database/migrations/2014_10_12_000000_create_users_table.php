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
            $table->integer('role_id')->default(2);
            $table->string('user_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('about')->nullable();
            $table->string('address')->nullable();
            $table->string('education')->nullable();
            $table->string('skills')->nullable();
            $table->string('notes')->nullable();
            $table->string('mobile')->nullable();
            $table->string('code')->nullable();
            $table->string('desi_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('roll_id')->nullable();
            $table->tinyinteger('status')->default(1);
            $table->string('image')->default('default.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
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
