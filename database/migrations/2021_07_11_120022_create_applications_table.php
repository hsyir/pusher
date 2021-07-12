<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id()->startingValue(100000);
            $table->string("name");
            $table->string("key");
            $table->string("secret");
            $table->string("path")->nullable();
            $table->integer("capacity")->nullable();
            $table->boolean("forceTLS")->default(true);
            $table->boolean("enable_client_messages")->default(false);
            $table->boolean("enable_statistics")->default(true);
            $table->string("comment")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('applications');
    }
}
