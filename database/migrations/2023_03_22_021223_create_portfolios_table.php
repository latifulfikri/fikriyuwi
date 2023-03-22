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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->integer('portfolio_id',true);
            $table->string('portfolio_headline',255);
            $table->longText('portfolio_description');
            $table->string('portfolio_role',255);
            $table->string('portfolio_accomplished',255);
            $table->string('portfolio_link',255);
            $table->integer('type_id');
            $table->foreign('type_id')->references('type_id')->on('portfolio_type')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('portfolio_image',255);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};
