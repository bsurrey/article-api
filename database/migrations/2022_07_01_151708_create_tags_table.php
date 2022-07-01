<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            // tag id
            $table->id();

            // tag name
            $table->string('name')
                ->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tags');
    }
};
