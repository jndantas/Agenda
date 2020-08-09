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
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('enterprise');
            $table->string('cnpj');
            $table->string('phone');
            $table->string('responsible');
            $table->string('email');
            $table->uuid('address_principal');
            $table->string('cep');
            $table->string('street');
            $table->string('district');
            $table->string('complement')->nullable();
            $table->string('number');
            $table->string('city');
            $table->string('state');
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
        Schema::dropIfExists('costumers');
    }
}
