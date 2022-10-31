<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
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
        'history',

        'tire',
        'inventory',
        'returns',
        'min_on_hand',
        'min_order',
        'on_order',
        'mounted',
        'scrapped',
        'warranty_interval_type',
        'warranty_interval_default',
        'warranty_interval_default_type',
        'costing_method',
        'last_cost',
        'standard_cost',
        'average_cost',
        'charge_base',
        'charge_base_list',
        'charge_base_cost',
        'charge_base_list_minus',
        'charge_base_price_a',
        'charge_base_price_b',
        'charge_base_price_c',
        'charge_base_price_d',
        'charge_base_price_e',
        'uom'	

    ];

    public function getFirstPicture($id) 
    {

        $part = Part::find($id);
        $pics = json_decode($part->pictures);

        return $pics[0];

    }

    public function getSupplierCompany($id) 
    {

        $part = Part::find($id);
        $supplier = Supplier::find($part->supplier_id);

        return $supplier->supplier_company;

    }

    public function getSupplierId($id) 
    {

        $part = Part::find($id);
        $supplier = Supplier::find($part->supplier_id);

        return $supplier->id;

    }

}
