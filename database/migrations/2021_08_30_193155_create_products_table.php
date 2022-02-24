<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->mediumText('summary');
            $table->longText('description')->nullable();
            $table->string('photo');
            $table->integer('stock')->default(1);
            $table->enum('size',['S','M','L'])->default('M');//->default('M')->nullable();
            $table->enum('condition',['popular','new','winter'])->default('new');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->float('price');
            $table->float('discount')->nullabale();
            $table->float('offer_price')->deault(false);
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('added_by')->nullable();

            $table->unsignedBigInteger('brand_id')->nullable();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
           // $table->foreign('vendor_id')->references('id')->on('users')->onDelete('SET NULL');

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
        Schema::dropIfExists('products');
    }
}
