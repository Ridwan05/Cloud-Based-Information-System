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
            $table->date('date_recorded');
            $table->integer('number_of_birds', false, true);
            $table->integer('feed_consumed_bags', false, true)
                ->comment('Quantity of feed consumed for the day, measured in bags');

            $table->decimal('price_per_bag', 12, 2, true)
                ->comment('purchase price of each of the bags consumed');

            $table->decimal('payable_to_supplier', 12, 2, true)
                ->comment('Amount owed to suppliers for the day')
                ->default(0);

            $table->decimal('other_expenses', 12, 2, true)
                ->comment('Other production expenses incurred outside feed cost')
                ->default(0);

            $table->decimal('total_expenses', 12, 2, true)
                ->comment('Total amount expended in production for the day')
                ->default(0);

            $table->integer('crates', false, true)
                ->comment('Amount of crates of eggs produced for the day')
                ->default(0);

            $table->integer('cracks', false, true)
                ->comment('Amount of cracked eggs produced for the day')
                ->default(0);

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete()
                ->cascadeOnUpdate();
            
            
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
