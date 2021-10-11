<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipCommissionsToServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('commission_id')->nullable();
            $table->foreign('commission_id', 'commission_fk_4402990')->references('id')->on('commissions');
        });
    }
}
