<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus facebook_id jika ada (optional)
            if (Schema::hasColumn('users', 'facebook_id')) {
                $table->dropColumn('facebook_id');
            }
            
            // Tambahkan github_id
            $table->string('github_id')->nullable()->unique()->after('google_id');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_id');
            
            // Jika ingin kembalikan facebook_id (optional)
            // $table->string('facebook_id')->nullable()->unique()->after('google_id');
        });
    }
};