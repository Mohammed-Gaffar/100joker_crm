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
            $table->string('sequence')->unique();
            $table->string('name');
            $table->string('work_function');
            $table->string('personal_email')->unique();
            $table->bigInteger('personal_phone');
            $table->string('company');
            $table->bigInteger('work_phone');
            $table->string('work_email');
            $table->string('address');
            $table->integer('user');
            $table->integer('supervisor');
            $table->integer('contract_status')->default('1');
            $table->integer('is_active')->default('1');
//            $table->integer('ident_type');
            $table->string('notes');
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
