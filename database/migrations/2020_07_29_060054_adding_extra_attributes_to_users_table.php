<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingExtraAttributesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('address')->nullable()->after('password');
            $table->text('photo')->nullable()->after('address');
            $table->boolean('admin')->default(false)->after('photo');
            $table->boolean('active')->default(false)->after('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('photo');
            $table->dropColumn('admin');
            $table->dropColumn('active');
        });
    }
}
