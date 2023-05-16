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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('ref_number');
            $table->bigInteger('tax')->unsigned();
            $table->bigInteger('discount')->unsigned();
            $table->bigInteger('amount')->unsigned();
            $table->bigInteger('subamount')->unsigned();
            $table->text('details')->nullable();
            $table->text('extra')->nullable();
            $table->string('payment_method');
            $table->date('issue_date')->nullable();
            $table->date('due_date')->nullable();
            $table->bigInteger('status')->unsigned()->default(1);
            $table->bigInteger('category')->nullable();       
            $table->bigInteger('customer')->unsigned();
            $table->bigInteger('mark_deleted')->default('0');
            $table->bigInteger('templates')->default('0');
            $table->string('currency')->nullable();
            $table->bigInteger('created_by');
           
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
        Schema::dropIfExists('invoices');
    }
};
