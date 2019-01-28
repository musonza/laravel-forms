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
            $table->unsignedInteger('status')->default(0);
            $table->boolean('enable_captcha')->default(true);
            $table->timestamps();
        });

        Schema::create('mc_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->string('label')->nullable();
            $table->string('placeholder')->nullable();
            $table->string('help_text')->nullable();
            $table->boolean('is_required')->default(true);
            $table->text('description')->nullable();
            $table->text('field_type');
            $table->text('validations')->nullable();
            $table->json('properties')->nullable();
            $table->json('options')->default();
            $table->text('default_value')->nullable();
            $table->unsignedInteger('columns')->default(12);
            $table->unsignedInteger('position')->nullable();
            $table->timestamps();

            $table->foreign('form_id')
                ->references('id')
                ->on('mc_forms')
                ->onDelete('cascade');
        });

        Schema::create('mc_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('submission_id');
            $table->text('value');
            $table->timestamps();

            $table->foreign('question_id')
                ->references('id')
                ->on('mc_questions')
                ->onDelete('cascade');

            $table->foreign('submission_id')
                ->references('id')
                ->on('mc_submissions')
                ->onDelete('cascade');
        });

        Schema::create('mc_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->json('ip_address')->nullable();
            $table->json('response')->nullable();
            $table->boolean('is_complete')->default(false);
            $table->timestamps();

            $table->foreign('form_id')
                ->references('id')
                ->on('mc_forms')
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
        Schema::dropIfExists('mc_submissions');
    }
}
