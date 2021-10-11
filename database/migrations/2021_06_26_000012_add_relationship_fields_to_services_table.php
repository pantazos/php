<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_4224833')->references('id')->on('categories');
        });
    }
}
