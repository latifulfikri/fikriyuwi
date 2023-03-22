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
        Schema::create('experience', function (Blueprint $table) {
            $table->integer('experience_id',true);
            $table->string('experience_headline',255);
            $table->string('experience_company',255);
            $table->date('experience_start');
            $table->date('experience_end')->nullable(true);
            $table->longText('experience_description');
            $table->string('experience_certificate',255)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience');
    }
};
