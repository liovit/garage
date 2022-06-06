<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment_Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'quantity',
        'price',
        'description',
        'status',
        'order_status',
        'order_id',
        'code',
        'bar_code',
        'supplier_id',
        'instructions',
        'invoices'
    ];

}
