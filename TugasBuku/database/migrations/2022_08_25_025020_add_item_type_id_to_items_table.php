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
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger("item_type_id")->default(1)->after("id");
            $table->foreign("item_type_id")->references("id")->on("item_types")->onDelete("restrict")->onUpdate("cascade")->after("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign("items_item_type_id_foreign");
            $table->dropColumn("item_type_id");

        });
    }
};
