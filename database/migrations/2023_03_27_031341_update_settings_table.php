<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings',function(Blueprint $table){
            $table->string('shared_area_price_per_hour')->nullable()->after('price_per_hour');
            $table->string('small_room_price_per_hour')->nullable()->after('shared_area_price_per_hour');
            $table->string('big_room_price_per_hour')->nullable()->after('small_room_price_per_hour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings',function(Blueprint $table){
            $table->dropColumn('shared_area_price_per_hour');
            $table->dropColumn('small_room_price_per_hour');
            $table->dropColumn('big_room_price_per_hour');
        });
    }
};
