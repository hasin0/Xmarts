<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
           // $table->string('username')->nullable();
            $table->string('email')->unique();//->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');//->nullable();
            $table->enum('status',['active','inactive'])->default('active');

           // $table->string('photo')->nullable();
            //$table->string('phone')->unique()->nullable();
         //   $table->text('address')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
