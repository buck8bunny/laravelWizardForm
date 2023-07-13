<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('report');
            $table->date('date_of_birth');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->string('сompany')->nullable();
            $table->string('position')->nullable();
            $table->string('about')->nullable();
            $table->string('file_name')->nullable();;
            $table->timestamp('uploaded_on')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

