<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Rlc\Csat\Models\CsatConfig;

class CreateCsat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('rating')->nullable();
            $table->string('score')->nullable();
            $table->string('comment')->nullable();
            $table->string('location')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('csat_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('enabled')->default('1');
            $table->string('link')->default('csat');
            $table->string('target')->default('_self');
            $table->string('class')->default('csat');
            $table->string('align')->default('right');
            $table->string('top')->default('75%');
            $table->integer('minutes')->default('0');
            $table->string('image')->default('img/csat.png');
            $table->string('alt')->default('CSAT');
            $table->integer('height')->default('50');
            $table->integer('width')->default('50');
            $table->string('bgcolor')->default('white');
            $table->string('question')->default('How was your overall experience while using the application?');
            $table->string('message')->default('Thanks for your rating!');
            $table->string('deny')->default('admin*');
            $table->string('allow')->default('admin/config/content/csat_report');
            $table->timestamps();
        });

        CsatConfig::updateOrcreate([
                'id' => 1
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csats');
        Schema::dropIfExists('csat_configs');
    }
}
