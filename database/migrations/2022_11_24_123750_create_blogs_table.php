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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('main_image');
            $table->enum('status', ['active', 'not_active']);
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('CASCADE');
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('CASCADE');
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
        Schema::dropIfExists('blogs');
    }
};
