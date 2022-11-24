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
        Schema::create('sales_records', function (Blueprint $table) {
            $table->id();
            $table->date('date_recorded');

            $table->integer('available_stock', false, true)
                ->comment('Quantity of eggs in stock, measured in crates')
                ->default(0);

            $table->decimal('price_per_crate', 10, 2, true)
                ->comment('Selling price of each crate');

            $table->integer('crates_sold', false, true)
                ->comment('Quantity of crates of eggs sold');

            $table->decimal('total_revenue', 12, 2, true)
                ->comment('Amount received, in naira');

            $table->decimal('outstanding_balance', 12, 2, true)
                ->comment('Outstanding balance, in naira');

            $table->decimal('balance_payment', 12, 2, true)
                ->comment('Amount received as payment for debt, in naira');

            $table->decimal('cash_transfer_to_production', 12, 2, true)
                ->comment('Amount returned for production, in naira');

            $table->decimal('bank_deposit', 12, 2, true)
                ->comment('Amount deposited to the bank, in naira');

            $table->string('comments', 5000)->nullable();
                
            $table->bigInteger('created_by', false, true)->nullable();                
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
                
            $table->bigInteger('updated_by', false, true)->nullable();                
            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('sales_records');
    }
};
