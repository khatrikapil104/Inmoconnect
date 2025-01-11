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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('user_role_id')->unsigned()->index();
            $table->foreign('user_role_id')->references('id')->on('user_roles')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->smallInteger('is_active')->default(1);
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Removes the deleted_at column during rollback
            $table->dropColumn('user_role_id');
            $table->dropColumn('image');
            $table->dropColumn('phone');
            $table->dropColumn('is_active');
        });
    }
};
