<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStdAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('task_id');
            $table->string('img');
            $table->string('pdf');
            $table->string('point');
            $table->string('status');
            $table->string('point_sum')->nullable();
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
        Schema::dropIfExists('std_assignments');
    }
}
