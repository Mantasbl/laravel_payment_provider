<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubscriptionsTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create subscriptions table
        Schema::create('tbl_subscriptions', function (Blueprint $table) {
            $table->id('subscription_id');
            $table->string('subscription_uuid')->unique();
            $table->timestamp('subscription_added_datetime');
            $table->dateTime('subscription_valid_until');
            $table->string('subscription_user_reference', 255); // User - payment provider mapping reference
            $table->string('subscription_status', 255); // Current subscription status
        });

        // Create transactions table
        Schema::create('tbl_transactions', function (Blueprint $table) {
            $table->id('transaction_id'); // Internal ID, used for indexing
            $table->string('transaction_uuid')->unique();
            $table->timestamp('transaction_added_datetime');
            $table->integer('transaction_provided_id'); // Transaction ID, provided by external payment provided, is not used as a primary key, due to small off chance that we get the same transaction id from separate payment providers
            $table->string('transaction_provider', 255); // Payment provider that processed this transaction, to make data more readable/searchable in the future
            $table->string('transaction_user_reference', 255); // User - payment provider mapping reference
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop tables
        Schema::dropIfExists('tbl_subscriptions');
        Schema::dropIfExists('tbl_transactions');
    }
}
