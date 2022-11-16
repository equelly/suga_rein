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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('likes')->nullable();
            $table->boolean('is_published')->default(1);
            $table->string('image')->nullable();  
            $table->timestamps();
            //метод позволяет удалять с возможностью отката назад
            //нужно прописать ссылку на него в models
            $table->softDeletes();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->index('product_id', 'post_product_idx');
            $table->foreign('product_id', 'post_product_fk')->on('products')->references('id');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
