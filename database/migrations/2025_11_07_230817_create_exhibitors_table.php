<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('exhibitors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('booth_type'); // Startup Pod, Growth Booth, Corporate Showcase
            $table->string('website')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('logo_url')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exhibitors');
    }
};
