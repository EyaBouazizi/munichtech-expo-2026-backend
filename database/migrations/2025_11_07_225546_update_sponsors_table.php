<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('sponsors', function (Blueprint $table) {
        if (!Schema::hasColumn('sponsors', 'tier')) {
            $table->string('tier')->after('name');
        }

        if (!Schema::hasColumn('sponsors', 'pricing')) {
            $table->decimal('pricing', 8, 2)->nullable()->after('tier');
        }

        if (!Schema::hasColumn('sponsors', 'benefits')) {
            $table->text('benefits')->nullable()->after('pricing');
        }

        if (!Schema::hasColumn('sponsors', 'logo_url')) {
            $table->string('logo_url')->nullable()->after('benefits');
        }

        if (!Schema::hasColumn('sponsors', 'contact_email')) {
            $table->string('contact_email')->nullable()->after('logo_url');
        }

        if (!Schema::hasColumn('sponsors', 'meta')) {
            $table->json('meta')->nullable()->after('contact_email');
        }
    });
}


    public function down(): void
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropColumn(['tier', 'pricing', 'benefits', 'logo_url', 'contact_email', 'meta']);
        });
    }
};
