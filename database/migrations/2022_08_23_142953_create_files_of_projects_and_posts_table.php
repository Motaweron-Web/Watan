<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesOfProjectsAndPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_of_projects_and_posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('projects_id')->references('id')->on('projects')
                ->onUpdate('cascade')->onDelete('cascade');

//            $table->unsignedBigInteger('post_id')->nullable();
//            $table->foreign('post_id')->references('id')->on('posts')
//                ->onUpdate('cascade')->onDelete('cascade');

            $table->enum('type',['image','video','file'])->default('image');



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
        Schema::dropIfExists('files_of_projects_and_posts');
    }
}
