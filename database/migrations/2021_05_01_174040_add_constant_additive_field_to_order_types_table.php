<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstantAdditiveFieldToOrderTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_types', function (Blueprint $table) {
            $table->decimal('constant_additive',10, 2)->default(0)->after('coefficient');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_types', function (Blueprint $table) {
            $table->dropColumn(['constant_additive']);
        });
    }
}
