<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPackagePricesToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->bigInteger('package_price_id')->nullable()->index()->after('socket');
            $table->timestamp('package_start_date')->nullable()->index()->after('package_price_id');
            $table->timestamp('package_expiry_date')->nullable()->index()->after('package_start_date');
            
            $table->integer('package_used_days')->nullable()->default(0)->after('package_expiry_date');
            $table->integer('package_used_minutes')->nullable()->default(0)->after('package_used_days');
            $table->boolean('package_subscribed')->nullable()->default(0)->index()->after('package_used_minutes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            
            $table->dropColumn(['package_price_id', 'package_start_date', 'package_expiry_date', 'package_used_days', 'package_used_minutes', 'package_subscribed']);
            
        });
    }
}
