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
        Schema::create('production_records', function (Blueprint $table) {
            $table->id();
            $table->date('date_recorded')->unique();
            $table->integer('number_of_birds', false, true);
            $table->decimal('feed_consumed_bags', 7, 2, true)
                ->comment('Quantity of feed consumed for the day, measured in bags');

            $table->decimal('feed_price_per_bag', 12, 2, true)
                ->comment('purchase price of each of the bags consumed');

            $table->decimal('total_feed_cost', 12, 2, true)
                ->comment('Total amount spent on feeds');

            $table->decimal('payable_to_supplier', 12, 2, true)
                ->comment('Amount owed to suppliers for the day')
                ->nullable()
                ->default(0);

            $table->decimal('other_expenses', 12, 2, true)
                ->comment('Other production expenses incurred outside feed cost')
                ->nullable()
                ->default(0);

            $table->decimal('total_expenses', 12, 2, true)
                ->comment('Total amount expended in production for the day')
                ->nullable()
                ->default(0);
                
            $table->integer('units_of_eggs_produced', false, true)
                ->comment('Unit of eggs produced for the day')
                ->nullable()
                ->default(0);
                
            $table->integer('crates_of_eggs_produced', false, true)
                ->comment('Amount of crates of eggs produced for the day')
                ->nullable()
                ->default(0);
                
            $table->integer('number_of_cracked_eggs', false, true)
                ->comment('Amount of cracked eggs produced for the day')
                ->nullable()
                ->default(0);
                
            $table->integer('bird_mortalities', false, true)
                ->comment('Number of bird mortalities recorded for the day')
                ->nullable()
                ->default(0);
    
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
        Schema::dropIfExists('production_records');
    }
};
