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
     */// create_users_table
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('username')->nullable();
            $table->string('email')->unique();//->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');//->nullable();
            $table->string('photo')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->text('address')->nullable();


            $table->enum('role',['admin','vendor','customer'])->default('customer');
          //  $table->string('provider')->nullable();
            //$table->string('provider_id')->nullable();
            $table->enum('status',['active','inactive'])->default('active');


           












            $table->rememberToken()->nullable();
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
