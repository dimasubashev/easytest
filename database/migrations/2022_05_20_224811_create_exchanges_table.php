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
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            
            //  Currency that user wants to convert from
            $table->string('from_currency');

            //  Currency that user wants to convert to.
            $table->string('to_currency');

            // Rate is our exchange value. 
            $table->decimal('rate');

            //  Amount of source currency that should be converted.
            $table->decimal('amount');

            //  Amount of source currency that should be converted.
            $table->decimal('result');

            // The timestamp when the conversion is done.
            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
};
