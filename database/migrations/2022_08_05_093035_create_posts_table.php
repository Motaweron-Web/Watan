<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->enum('status',['sale','buy'])->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_code')->nullable();

            $table->text('description')->nullable();
            $table->enum('furniture',[0,1])->default(0);
            $table->double('price')->nullable();
            $table->text('size')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('baby_room')->nullable();
            $table->integer('kitchen')->nullable();
            $table->integer('reception_room')->nullable();
            $table->integer('dining_room')->nullable();
            $table->string('advertizer_name')->nullable();
            $table->string('whatsapp')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->boolean('is_inves_bed')->default(0);










            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')->on('agents')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('sub_area_id')->nullable();
            $table->foreign('sub_area_id')->references('id')->on('subareas')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');





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
        Schema::dropIfExists('posts');
    }
}
