<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            // article id
            $table->id();

            // article name
            $table->string('name')
                ->index();

            //article author
            $table->string('author')
                ->index();

            // article text
            $table->text('text');

            // article publication date
            $table->timestamp('publication_date')
                ->nullable();

            // article expiration date
            $table->timestamp('expiration_date')
                ->nullable();

            // creation date
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
