<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        try {
            Schema::create('level_translation', function (Blueprint $table) {
                $table->id();
                $table->string('language_code');
                $table->foreign('language_code')->references('language_code')->on('languages');
                $table->foreignId('level_id')->constrained();
                $table->string('name');
                $table->longText('description')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
                $table->softDeletes();
                $table->unsignedBigInteger('created_by_user_id')->nullable();
                $table->unsignedBigInteger('updated_by_user_id')->nullable();
                $table->unsignedBigInteger('deleted_by_user_id')->nullable();
            });
        } catch (\Exception $e) {
            $this->down();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_translations');
    }
}
