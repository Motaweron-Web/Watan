<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable();

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')->on('agents')
                ->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')
                ->onUpdate('cascade')->onDelete('set null');

            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();

            $table->double('min_price')->nullable();
            $table->double('max_price')->nullable();

            $table->enum('project_status',['new','ongoing','finished'])->default('new');

//            $table->enum('is_furnished',[0,1])->default(0);

            $table->double('area_range')->nullable();

            $table->double('min_price_of_meter')->nullable();
            $table->double('max_price_of_meter')->nullable();

            $table->text('desc')->nullable();

            $table->text('payment_terms')->nullable();
            $table->text('payment_details')->nullable();

            $table->enum('is_invested',[0,1])->default(0);








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
        Schema::dropIfExists('projects');
    }
}
