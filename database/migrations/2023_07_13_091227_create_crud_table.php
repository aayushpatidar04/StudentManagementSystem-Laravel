<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crud', function (Blueprint $table) {
            $table->id();
            $table->string('rollno', 100);
            $table->string('email',100);
            $table->string('password');
            $table->enum('role', ['admin','student','teacher','admission']);
            $table->string('userimage');
            $table->string('name',50);
            $table->enum('class',[1,2,3,4,5,6,7,8,9,10]);
            $table->enum('section',['A','B','C']);
            $table->string('subject',50);
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crud');
    }
};
