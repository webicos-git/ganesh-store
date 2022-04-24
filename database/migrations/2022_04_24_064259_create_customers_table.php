<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('phone');
            $table->mediumText('address');

            $table->foreignId('group_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('email')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('opening_balance')->nullable();
            $table->timestamp('as_of_date')->nullable();
            $table->boolean('to_receive')->nullable();
            $table->boolean('to_pay')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
