<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Offer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('admin_name', 25);
            $table->string('categories', 25);
            $table->string('positions', 25);
            $table->string('cities', 25);
            $table->string('url', 150);
            $table->string('apply_url', 150);
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->string('code', 15)->unique();
            $table->string('provider', 25);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
