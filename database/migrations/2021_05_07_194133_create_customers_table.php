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
            // address
            $table->string('company')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('extension')->nullable();
            $table->string('toll_free')->nullable();
            $table->string('fax')->nullable();
            $table->string('alt_telephone')->nullable();
            $table->string('alt_extension')->nullable();
            $table->string('license')->nullable();
            $table->string('credit_customer')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('contact_preference')->nullable();
            // billing
            $table->string('part_charge_base')->nullable();
            $table->string('part_product_default')->nullable();
            $table->string('part_list_percentage')->nullable();
            $table->string('part_cost_percentage')->nullable();
            $table->string('part_list_minus_percentage')->nullable();
            $table->string('part_a_percentage')->nullable();
            $table->string('part_b_percentage')->nullable();
            $table->string('part_c_percentage')->nullable();
            $table->string('part_d_percentage')->nullable();
            $table->string('part_e_percentage')->nullable();
            $table->string('task_charge_base')->nullable();
            $table->string('customer_pricing_by_task')->nullable();
            $table->string('calculation_type')->nullable();
            $table->string('task_labor_rate')->nullable();
            $table->string('task_po_markup_percentage')->nullable();
            $table->string('shop_charge_percentage')->nullable();
            $table->string('shop_cost_percentage')->nullable();
            // comments
            $table->string('comments_language')->nullable();
            $table->string('comments_instructions')->nullable();
            // accounting
            $table->string('tax_code')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('credit_limit')->nullable();
            $table->string('terms_balance')->nullable();
            $table->string('terms_disc_due')->nullable();
            $table->string('terms_payment')->nullable();
            $table->string('date_exported')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('monthly_charge')->nullable();
            $table->string('accounting_id')->nullable();
            //
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
