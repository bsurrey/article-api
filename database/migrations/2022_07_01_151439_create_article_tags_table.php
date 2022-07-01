<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('article_tags', function (Blueprint $table) {
            // article id
            $table->foreignId('article_id');

            //tag id
            $table->foreignId('tag_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_tags');
    }
};
