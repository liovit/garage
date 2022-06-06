<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'supplier_company',
        'supplier_city',
        'supplier_state',
        'supplier_address',
        'supplier_post',
        'supplier_email',
        'supplier_telephone',
        'supplier_fax',
        'supplier_toll',
        'supplier_alt_phone',
        'billing_name',
        'billing_company',
        'billing_city',
        'billing_state',
        'billing_address',
        'billing_post',
        'billing_email',
        'billing_telephone',
        'billing_fax',
        'billing_toll',
        'billing_alt_phone',
        'alt_contacts_names',
        'alt_contacts_emails',
        'alt_contacts_phones',
        'alt_contacts_faxes',
        'comments'
    ];

}
