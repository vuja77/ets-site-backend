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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("mail");
            $table->string("password");
            $table->text("gender")->nullable();
            $table->text("photo")->default("default.png");
            $table->foreignId('role_id')->default(1)->constrained();
            $table->foreignId('ed_program_id')->nullable()->constrained();
            $table->foreignId('class_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
