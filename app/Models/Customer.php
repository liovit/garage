<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [

        'company',
        'name',
        'address',
        'city',
        'postal_code',
        'country',
        'state',
        'email',
        'telephone',
        'extension',
        'toll_free',
        'fax',
        'alt_telephone',
        'alt_extension',
        'license',
        'credit_customer',
        'customer_type',
        'contact_preference',
        'default_calculation',
        'part_charge_base',
        'part_product_default',
        'part_list_percentage',
        'part_cost_percentage',
        'part_list_minus_percentage',
        'part_a_percentage',
        'part_b_percentage',
        'part_c_percentage',
        'part_d_percentage',
        'part_e_percentage',
        'task_charge_base',
        'customer_pricing_by_task',
        'calculation_type',
        'task_labor_rate',
        'task_po_markup_percentage',
        'shop_charge_percentage',
        'shop_cost_percentage',
        'comments_language',
        'comments_instructions',
        'tax_code',
        'tax_id',
        'credit_limit',
        'base_shop_charge',
        'interest_charge',
        'interest_charge_time',
        'terms_balance',
        'terms_disc_due',
        'terms_payment',
        'date_exported',
        'discount_percentage',
        'monthly_charge',
        'accounting_id',

    ];

}
