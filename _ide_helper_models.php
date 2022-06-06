<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $date
 * @property string $description
 * @property string|null $time_from
 * @property string|null $time_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTimeFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTimeTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Part
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $bar_code
 * @property string|null $category
 * @property string|null $type
 * @property string|null $location
 * @property string|null $on_hand
 * @property string|null $price
 * @property int|null $supplier_id
 * @property string|null $qty
 * @property string|null $model
 * @property string|null $make
 * @property string|null $style
 * @property string|null $pictures
 * @property string|null $invoices
 * @property string|null $warranty_time
 * @property string|null $warranty_interval
 * @property string|null $prices
 * @property string|null $discount
 * @property string|null $description
 * @property string|null $garage_location
 * @property int|null $status
 * @property string|null $product_no
 * @property string|null $order_qty
 * @property string|null $unit_cost
 * @property string|null $cost
 * @property string|null $qty_rec
 * @property string|null $qty_rec_today
 * @property string|null $unit_cost_today
 * @property string|null $date_rec
 * @property string|null $qty_return
 * @property string|null $instructions
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Part newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Part newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Part query()
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereBarCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereDateRec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereGarageLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereInvoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereOnHand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereOrderQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part wherePrices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereProductNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereQtyRec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereQtyRecToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereQtyReturn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereUnitCostToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereWarrantyInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereWarrantyTime($value)
 */
	class Part extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Supplier
 *
 * @property int $id
 * @property string|null $supplier_name
 * @property string|null $supplier_company
 * @property string|null $supplier_city
 * @property string|null $supplier_state
 * @property string|null $supplier_address
 * @property string|null $supplier_post
 * @property string|null $supplier_email
 * @property string|null $supplier_telephone
 * @property string|null $supplier_fax
 * @property string|null $supplier_toll
 * @property string|null $supplier_alt_phone
 * @property string|null $billing_city
 * @property string|null $billing_state
 * @property string|null $billing_address
 * @property string|null $billing_post
 * @property string|null $billing_email
 * @property string|null $billing_telephone
 * @property string|null $billing_fax
 * @property string|null $billing_toll
 * @property string|null $billing_alt_phone
 * @property string|null $alt_contacts_names
 * @property string|null $alt_contacts_emails
 * @property string|null $alt_contacts_phones
 * @property string|null $alt_contacts_faxes
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereAltContactsEmails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereAltContactsFaxes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereAltContactsNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereAltContactsPhones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingAltPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereBillingToll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierAltPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierToll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUpdatedAt($value)
 */
	class Supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $date_of_birth
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $phone
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

