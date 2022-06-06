<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part_Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'code',
        'bar_code',
        'category',
        'type',
        'location',
        'on_hand',
        'price',
        'supplier_id',
        'qty',
        'model',
        'make',
        'style',
        'pictures',
        'invoices',
        'warranty_time',
        'warranty_interval',
        'prices',
        'discount',
        'description',
        'garage_location',
        'unit_cost_today',

        'status',
        'product_no',
        'order_qty',
        'unit_cost',
        'cost',
        'qty_rec',
        'qty_rec_today',
        'unit_cost_today',
        'date_rec',
        'qty_return',
        'instructions',
        'order_id',
        'order_status',

    ];

}
