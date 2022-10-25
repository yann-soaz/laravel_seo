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
        Schema::create('seo-images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('fb_title')->nullable();
            $table->longText('fb_description')->nullable();
            $table->foreignId('fb_image')->nullable()->refence('id')->on('seo-images');
            $table->string('tw_title')->nullable();
            $table->longText('tw_description');
            $table->foreignId('tw_image')->nullable()->refence('id')->on('seo-images');
            $table->integer('content_id')->nullable();
            $table->string('content_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo-images');
        Schema::dropIfExists('seo');
    }
};
