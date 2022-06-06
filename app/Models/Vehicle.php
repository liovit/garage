<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'type',
        'model',
        'make',
        'vin_code',
        'gas_type',
        'engine',
        'year',
        'company_vehicle_number',
        'number_plate',
        'engine_number',
        'color',
        'odometer_now',
        'odometer_before',
        'pictures'

    ];
}
