<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendancies', function (Blueprint $table) {
            $table->id();
            $table->boolean("notified")->default(false);
            $table->unsignedBigInteger("student_id")->nullable();
            $table->foreign("student_id")
                ->references("id")
                ->on("students")
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
        Schema::dropIfExists('attendancies');
    }
}
