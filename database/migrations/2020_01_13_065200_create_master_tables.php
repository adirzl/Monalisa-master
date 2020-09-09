<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('label', 50)->index();
            $table->string('uri', 50);
            $table->string('icon', 50)->nullable();
            $table->uuid('parent_id')->index()->nullable();
            $table->boolean('visible');
            $table->string('sequence', 10);
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
        });

        Schema::create('opt_groups', function(Blueprint $table){
            $table->uuid('id')->index();
            $table->string('name',32);
            $table->string('group', 4);
            $table->smallInteger('status');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
        });

        Schema::create('opt_values', function (Blueprint $table){
            $table->uuid('id')->index();
            $table->uuid('opt_group_id');
            $table->string('key', 4);
            $table->string('value', 128);
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
            $table->foreign('opt_group_id')
                ->references('id')
                ->on('opt_groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('opt_groups');
        Schema::dropIfExists('opt_values');
    }
}
