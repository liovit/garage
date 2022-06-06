<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //unprotected ajax routes (not important)
        '/management/suppliers/delete/altcontact',
        '/management/suppliers/update/altcontact',
        '/parts/get-supplier-emails',
        '/parts/get-similar-product',
        '/parts/get-existing-part',
        '/equipment/get-similar-product',
        '/orders/get-similar-vehicle',
        '/orders/add-this-vehicle',
        '/orders/delete-comment',
        '/work/vehicles/get-history',
    ];
}
