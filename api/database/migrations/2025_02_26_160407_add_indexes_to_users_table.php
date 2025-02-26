<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->index('id');
        $table->index('email');
        $table->index(['latitude', 'longitude']); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropIndex(['id']);
        $table->dropIndex(['email']);
        $table->dropIndex(['latitude', 'longitude']);
    });
}
};
