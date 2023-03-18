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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('logo');
            $table->string('logo_mini');
            $table->string('customer_login_image');
            $table->string('admin_login_image');
            $table->string('favicon')->nullable();
            $table->integer('inbudget_price');
            $table->string('contact_us_title');
            $table->longText('contact_us_msg');
            $table->longText('google_map');
            $table->longText('about_us');
            $table->string('about_image');
            $table->string('privacy_title');
            $table->longText('privacy_policy');
            $table->string('privacy_image')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
