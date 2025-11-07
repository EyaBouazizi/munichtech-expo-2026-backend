<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tier'); // e.g., Gold, Silver, Bronze
            $table->decimal('pricing', 8, 2)->nullable(); // optional
            $table->text('benefits')->nullable(); // optional
            $table->string('logo_url')->nullable();
            $table->string('contact_email')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
};
