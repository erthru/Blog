<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("body");
            $table->string("thumb");
            $table->enum("type", ["article", "page"]);
            $table->bigInteger("view");
            $table->unsignedBigInteger("writer_id");
            $table->timestamps();
        });

        Schema::table("contents", function (Blueprint $table){
            $table->foreign("writer_id")->references("id")->on("writers")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
