<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrowserVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try{
            Schema::create('browser_versions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('browser_id')->constrained()->cascadeOnDelete();
                $table->string('version');
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
        Schema::dropIfExists('browser_versions');
    }
}
