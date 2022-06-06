<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'order_fill_status',
        'parts_ids',
        'mechanic_id',
        'priority',
        'budget',
        'to_be_done',
        'done_jobs',
        'used_parts',
        'comments',
        'invoice_data_parts',
        'invoice_data_jobs',
        'order_end_odometer'
    ];

}
