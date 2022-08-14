<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('condition');
            $table->timestamps();
        });

        Schema::create('task_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('happen_at');
            $table->string('participant_types_id');
            $table->string('task_types_id');
            $table->timestamps();
        });

        Schema::create('task_logs', function (Blueprint $table) {
            $table->id();
            $table->string('tasks_id');
            $table->string('users_id');
            $table->string('eval');
            $table->timestamps();
        });

        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        Schema::dropIfExists('schools');
        Schema::dropIfExists('participant_types');
        Schema::dropIfExists('task_types');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('task_logs');
    }
};
