<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('supplier_company')->nullable();
            $table->string('supplier_city')->nullable();
            $table->string('supplier_state')->nullable();
            $table->string('supplier_address')->nullable();
            $table->string('supplier_post')->nullable();
            $table->string('supplier_email')->nullable();
            $table->string('supplier_telephone')->nullable();
            $table->string('supplier_fax')->nullable();
            $table->string('supplier_toll')->nullable();
            $table->string('supplier_alt_phone')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_post')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_telephone')->nullable();
            $table->string('billing_fax')->nullable();
            $table->string('billing_toll')->nullable();
            $table->string('billing_alt_phone')->nullable();
            $table->string('alt_contacts_names')->nullable();
            $table->string('alt_contacts_emails')->nullable();
            $table->string('alt_contacts_phones')->nullable();
            $table->string('alt_contacts_faxes')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
