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
        Schema::create('master_projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('master_siswa_id')->unsigned();
            $table->foreign('master_siswa_id')->references('id')->on('master_siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('project_name');
            $table->date('project_date');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_projects');
    }
};
