<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->text('description');
            $table->integer('seat_qty');
            $table->integer('transportation_typeid')->unsigned();
            $table->foreign('transportation_typeid')->references('id')->on('transportation_types')->onDelete('cascade');
            $table->timestamps();
        });
        $statement = "ALTER TABLE transportations AUTO_INCREMENT = 400001;";
        DB::unprepared($statement);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportations');        
    }
}
