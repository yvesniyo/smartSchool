<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string("uuid");
            $table->string("version");
            $table->unsignedInteger("admin_user_id");
            $table->foreign("admin_user_id")
                ->references("id")
                ->on("admin_users")
                ->cascadeOnDelete();
            $table->boolean("enabled")->default(false);
            $table->unsignedBigInteger("school_id")->nullable();
            $table->foreign("school_id")
                ->references("id")
                ->on("schools")
                ->cascadeOnDelete();
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
        Schema::dropIfExists('devices');
    }
}
