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
    Schema::table('attendances', function (Blueprint $table) {
        $table->double('work_days', 8, 2)->default(1)->after('clock_out');
    });
}

    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn('work_days');
        });
    }
};
