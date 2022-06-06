<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing_Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_percentage',
        'equipment_percentage',
        'work_hourly_cost'
    ];

}
