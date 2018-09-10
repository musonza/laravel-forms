<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('mc_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->string('title');
            $table->string('label')->nullable();
            $table->boolean('is_required')->default(true);
            $table->text('description')->nullable();
            $table->text('field_type');
            $table->text('validations')->nullable();
            $table->json('properties')->nullable();
            $table->timestamps();

            $table->foreign('form_id')
                ->references('id')
                ->on('mc_forms')
                ->onDelete('cascade');
        });

        Schema::create('mc_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_id');
            $table->text('value');
            $table->timestamps();

            $table->foreign('question_id')
                ->references('id')
                ->on('mc_questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mc_forms');
        Schema::dropIfExists('mc_questions');
        Schema::dropIfExists('mc_answers');
    }
}
