<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
    
        'title',
        'description',
        'location',
        'creation_date',
        'type',
        'warranty_time',
        'warranty_inform',
        'price',
        'quantity',
        'picture',
        'supplier_id',
        'bar_code',
        'code',
        'invoices'
    
    ];

}
