<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateNavigationTable extends Migration
{

    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('navigations')->onDelete('cascade');
            $table->integer('order')->default(0);
            $table->foreignId('page_id')->nullable()->constrained('pages')->onDelete('cascade');
            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navigations');
    }
}
