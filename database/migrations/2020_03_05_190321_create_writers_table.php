<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWritersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writers', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("bio");
            $table->string("avatar");
            $table->bigInteger("credential_id")->unsigned();
            $table->timestamps();
        });

        Schema::table("writers", function (Blueprint $table){
            $table->foreign("credential_id")->references("id")->on("credentials")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('writers');
    }
}
