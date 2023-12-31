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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("scorm_filename")->nullable()->default(null);
            $table->string("thumbnail")->default('default.jpg');
            $table->string("description")->nullable()->default(null);
            $table->foreignId('course_type_id')->constrained();
            $table->timestamps();
           
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
