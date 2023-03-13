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
            $table->integer('meter_id')->nullable();
            $table->integer('manager_id')->nullable();
            $table->string('username', 150);
            $table->string('name', 150);
            $table->string('email', 200);
            $table->string('phone', 200);
            $table->string('about', 200);
            $table->string('image')->nullable();
            $table->string('emo_expert')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('c_password');
            $table->tinyInteger('status')->default(0)->comment('0:block, 1:unblock');
            $table->integer('role')->default(0)->comment('0:user, 1:manager, 2:employee');
            $table->string('fcm_token', 200)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
};
