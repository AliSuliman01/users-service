<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrowsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try{
            Schema::create('browsers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('created_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->foreignId('updated_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->foreignId('deleted_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        }catch (\Exception $e){
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
        Schema::dropIfExists('browsers');
    }
}
