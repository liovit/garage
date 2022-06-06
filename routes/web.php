<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\EquipmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // my settings routes
    Route::get('/my-settings', [App\Http\Controllers\MySettings::class, 'index']);
    Route::post('/my-settings/change-password', [App\Http\Controllers\MySettings::class, 'change_password']);
    Route::post('/my-settings/set-notifications', [App\Http\Controllers\MySettings::class, 'set_notifications']);

    // calendar routes
    Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'calendar']);
    Route::get('/calendar/event/new', [App\Http\Controllers\HomeController::class, 'calendar_new_event']);
    Route::post('/calendar/event/confirm-creation', [App\Http\Controllers\HomeController::class, 'calendar_confirm_creation']);
    Route::get('/calendar/event/{id}', [App\Http\Controllers\HomeController::class, 'calendar_view_event']);
    Route::get('/calendar/event/edit/{id}', [App\Http\Controllers\HomeController::class, 'calendar_edit_event']);
    Route::put('/calendar/event/edit/confirm/{id}', [App\Http\Controllers\HomeController::class, 'calendar_event_update']);
    Route::get('/calendar/event/pre-delete/{id}', [App\Http\Controllers\HomeController::class, 'calendar_event_pre_delete']);
    Route::delete('/calendar/event/delete/{id}', [App\Http\Controllers\HomeController::class, 'calendar_event_delete']);
    //

    // user managing routes
    Route::get('/management/users', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/management/users/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::post('/management/users/confirm-creation', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/management/users/{user}', [App\Http\Controllers\UserController::class, 'show']);
    Route::get('/management/users/edit/{user}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::put('/management/users/edit/confirm/{user}', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/management/users/pre-delete/{user}', [App\Http\Controllers\UserController::class, 'show_destroy']);
    Route::delete('/management/users/delete/user/{user}', [App\Http\Controllers\UserController::class, 'destroy']);
    //

    // supplier managing routes
    Route::get('/management/suppliers', [App\Http\Controllers\ManagementController::class, 'suppliers']);
    Route::get('/management/suppliers/create', [App\Http\Controllers\ManagementController::class, 'suppliers_create']);
    Route::post('/management/suppliers/confirm-creation', [App\Http\Controllers\ManagementController::class, 'supplier_confirm_creation']);
    Route::get('/management/suppliers/{supplier}', [App\Http\Controllers\ManagementController::class, 'show_supplier']);
    Route::get('/management/suppliers/edit/{supplier}', [App\Http\Controllers\ManagementController::class, 'edit_supplier']);
    Route::put('/management/suppliers/edit/confirm/{supplier}', [App\Http\Controllers\ManagementController::class, 'confirm_supplier_update']);
    Route::get('/management/suppliers/pre-delete/{supplier}', [App\Http\Controllers\ManagementController::class, 'pre_delete_supplier']);
    Route::delete('/management/suppliers/delete/supplier/{supplier}', [App\Http\Controllers\ManagementController::class, 'delete_supplier']);
    Route::post('/management/suppliers/delete/altcontact', [App\Http\Controllers\ManagementController::class, 'delete_alt_contact']);
    Route::post('/management/suppliers/update/altcontact', [App\Http\Controllers\ManagementController::class, 'update_alt_contact']);
    //

    // roles managing routes
    Route::get('/management/roles', [App\Http\Controllers\ManagementController::class, 'roles']);
    Route::get('/management/roles/create', [App\Http\Controllers\ManagementController::class, 'roles_create']);
    Route::post('/management/roles/confirm-creation', [App\Http\Controllers\ManagementController::class, 'role_confirm_creation']);
    Route::get('/management/roles/{role}', [App\Http\Controllers\ManagementController::class, 'show_role']);
    Route::get('/management/roles/edit/{role}', [App\Http\Controllers\ManagementController::class, 'edit_role']);
    Route::put('/management/roles/edit/confirm/{role}', [App\Http\Controllers\ManagementController::class, 'confirm_role_update']);
    Route::get('/management/roles/pre-delete/{role}', [App\Http\Controllers\ManagementController::class, 'pre_delete_role']);
    Route::delete('/management/roles/delete/role/{role}', [App\Http\Controllers\ManagementController::class, 'delete_role']);
    //

    // billing managing routes
    Route::get('/settings/billing', [App\Http\Controllers\BillingController::class, 'index']);
    Route::post('/settings/billing/edit/confirm', [App\Http\Controllers\BillingController::class, 'update']);
    //

    // permission managing routes
    Route::get('/management/permissions', [App\Http\Controllers\ManagementController::class, 'permissions']);
    Route::get('/management/permissions/create', [App\Http\Controllers\ManagementController::class, 'permissions_create']);
    Route::post('/management/permissions/confirm-creation', [App\Http\Controllers\ManagementController::class, 'permission_confirm_creation']);
    //

    // mail managing routes
    Route::get('/settings/emails', [App\Http\Controllers\SettingsController::class, 'index_mail']);
    Route::get('/settings/emails/edit/{id}', [App\Http\Controllers\SettingsController::class, 'edit_mail']);
    Route::post('/settings/emails/edit/confirm/{id}', [App\Http\Controllers\SettingsController::class, 'confirm_email_edit']);

    // garage parts managing routes
    Route::get('/work/parts', [App\Http\Controllers\PartsController::class, 'index']);
    Route::get('/work/parts/garage', [App\Http\Controllers\PartsController::class, 'index_garage']);
    Route::get('/work/parts/order', [App\Http\Controllers\PartsController::class, 'order']);
    Route::get('/work/parts/order/{id}', [App\Http\Controllers\PartsController::class, 'view_order']);
    Route::post('/work/parts/confirm-order', [App\Http\Controllers\PartsController::class, 'confirm_order']);
    Route::get('/work/parts/create', [App\Http\Controllers\PartsController::class, 'create']);
    Route::get('/work/parts/{id}', [App\Http\Controllers\PartsController::class, 'show']);
    Route::get('/work/parts/edit/{id}', [App\Http\Controllers\PartsController::class, 'edit']);
    Route::post('/work/parts/edit/confirm/{id}', [App\Http\Controllers\PartsController::class, 'edit_confirm']);
    Route::post('/work/parts/edit/confirm/pictures/{id}', [App\Http\Controllers\PartsController::class, 'edit_upload_pictures']);
    Route::post('/work/parts/edit/confirm/invoices/{id}', [App\Http\Controllers\PartsController::class, 'edit_upload_invoices']);
    Route::post('/work/parts/order/edit/{id}', [App\Http\Controllers\PartsController::class, 'edit_order_part']);
    Route::post('/work/parts/order/edit/confirm/{id}', [App\Http\Controllers\PartsController::class, 'confirm_order_edit']);
    Route::get('/work/parts/order/pre-delete/{id}', [App\Http\Controllers\PartsController::class, 'pre_delete_order']);
    Route::get('/work/parts/pre-delete/{id}', [App\Http\Controllers\PartsController::class, 'pre_delete_part']);
    Route::post('/work/parts/order/delete/{id}', [App\Http\Controllers\PartsController::class, 'delete_order']);
    Route::post('/work/parts/delete/{id}', [App\Http\Controllers\PartsController::class, 'destroy']);
    Route::post('/work/parts/delete/picture/{id}', [App\Http\Controllers\PartsController::class, 'delete_picture']);
    Route::post('/parts/get-supplier-emails', [App\Http\Controllers\PartsController::class, 'get_emails']);
    Route::post('/parts/get-similar-product', [App\Http\Controllers\PartsController::class, 'get_products']);
    Route::post('/parts/get-existing-part', [App\Http\Controllers\PartsController::class, 'get_existing_part']);
    //

    // work orders routes
    Route::get('/work/orders', [App\Http\Controllers\OrdersController::class, 'index']);
    Route::get('/work/orders/{id}', [App\Http\Controllers\OrdersController::class, 'show']);
    Route::post('/work/orders/create', [App\Http\Controllers\OrdersController::class, 'create'])->name('create_order_work');
    Route::get('/work/orders/edit/{id}', [App\Http\Controllers\OrdersController::class, 'edit']);
    Route::get('/work/orders/finish/{id}', [App\Http\Controllers\OrdersController::class, 'finish']);
    Route::post('/work/orders/update/{id}', [App\Http\Controllers\OrdersController::class, 'update']);
    Route::get('/work/orders/pre-delete/{id}', [App\Http\Controllers\OrdersController::class, 'pre_delete']);
    Route::post('/work/orders/delete/{id}', [App\Http\Controllers\OrdersController::class, 'delete']);
    Route::get('/work/orders/pre-finish/{id}', [App\Http\Controllers\OrdersController::class, 'order_finish']);
    Route::get('/work/orders/create-new-customer/{order_id}', [App\Http\Controllers\OrdersController::class, 'create_new_customer']);
    Route::post('/work/orders/confirm-customer/{order_id}', [App\Http\Controllers\OrdersController::class, 'confirm_customer_creation']);
    Route::get('/work/orders/create/{id}/step-one', [App\Http\Controllers\OrdersController::class, 'create_step_one']);
    Route::get('/work/orders/create/{id}/step-two', [App\Http\Controllers\OrdersController::class, 'create_step_two']);
    Route::post('/work/orders/{id}/store/step-one', [App\Http\Controllers\OrdersController::class, 'store_step_one']);
    Route::post('/work/orders/{id}/store/step-two', [App\Http\Controllers\OrdersController::class, 'store_step_two']);
    Route::post('/orders/get-similar-vehicle', [App\Http\Controllers\OrdersController::class, 'get_similar_vehicle']);
    Route::post('/orders/add-this-vehicle', [App\Http\Controllers\OrdersController::class, 'add_this_vehicle']);
    Route::post('/orders/delete-comment', [App\Http\Controllers\OrdersController::class, 'delete_comment']);
    Route::post('/work/pdf/order/{id}', [App\Http\Controllers\OrdersController::class, 'pdf_select']);
    Route::get('/work/pdf/{id}/order', [App\Http\Controllers\OrdersController::class, 'pdf_select_edit']);
    Route::post('/work/pdf/complete/{id}', [App\Http\Controllers\OrdersController::class, 'pdf_complete']);
    Route::post('/work/add-job/{id}', [App\Http\Controllers\OrdersController::class, 'add_job']);
    Route::post('/work/remove-job/{id}', [App\Http\Controllers\OrdersController::class, 'remove_job']);
    Route::post('/work/add-part/{id}', [App\Http\Controllers\OrdersController::class, 'add_part']);
    Route::post('/work/remove-part/{id}', [App\Http\Controllers\OrdersController::class, 'remove_part']);

    // work vehicles routes
    Route::get('/work/vehicles', [App\Http\Controllers\VehiclesController::class, 'index']);
    Route::get('/work/vehicles/create', [App\Http\Controllers\VehiclesController::class, 'create']);
    Route::post('/work/vehicles/confirm-creation', [App\Http\Controllers\VehiclesController::class, 'store']);
    Route::get('/work/vehicles/{id}', [App\Http\Controllers\VehiclesController::class, 'show']);
    Route::get('/work/vehicles/edit/{id}', [App\Http\Controllers\VehiclesController::class, 'edit']);
    Route::post('/work/vehicles/update/{id}', [App\Http\Controllers\VehiclesController::class, 'update']);
    Route::post('/work/vehicles/edit/{id}/delete-picture', [App\Http\Controllers\VehiclesController::class, 'delete_picture']);
    Route::get('/work/vehicles/pre-delete/{id}', [App\Http\Controllers\VehiclesController::class, 'pre_delete']);
    Route::post('/work/vehicles/delete/{id}', [App\Http\Controllers\VehiclesController::class, 'destroy']);
    Route::post('/work/vehicles/get-history', [App\Http\Controllers\VehiclesController::class, 'get_history']);

    // customer routes
    Route::get('/customers', [App\Http\Controllers\CustomersController::class, 'index']);
    Route::get('/customers/create', [App\Http\Controllers\CustomersController::class, 'create']);
    Route::post('/customers/post', [App\Http\Controllers\CustomersController::class, 'post']);
    Route::get('/customers/edit/{id}', [App\Http\Controllers\CustomersController::class, 'edit']);
    Route::post('/customers/update/{id}', [App\Http\Controllers\CustomersController::class, 'update']);
    Route::get('/customers/{id}', [App\Http\Controllers\CustomersController::class, 'show']);
    Route::get('/customers/pre-delete/{id}', [App\Http\Controllers\CustomersController::class, 'pre_delete']);
    Route::delete('/customers/delete/{id}', [App\Http\Controllers\CustomersController::class, 'destroy']);

    // equipment managing routes
    Route::get('/work/equipment', [App\Http\Controllers\EquipmentController::class, 'index']);
    Route::get('/work/equipment/create', [App\Http\Controllers\EquipmentController::class, 'create']);
    Route::post('/work/equipment/store', [App\Http\Controllers\EquipmentController::class, 'store']);
    Route::get('/work/equipment/edit/{id}', [App\Http\Controllers\EquipmentController::class, 'edit']);
    Route::post('/work/equipment/edit/confirm/{id}', [App\Http\Controllers\EquipmentController::class, 'update']);
    Route::get('/work/equipment/{id}', [App\Http\Controllers\EquipmentController::class, 'show']);
    Route::get('/work/equipment/pre-delete/{id}', [App\Http\Controllers\EquipmentController::class, 'pre_delete']);
    Route::post('/work/equipment/delete/{id}', [App\Http\Controllers\EquipmentController::class, 'destroy']);
    Route::get('/work/orders-index/equipment', [App\Http\Controllers\EquipmentController::class, 'order_index']);
    Route::get('/work/order/equipment', [App\Http\Controllers\EquipmentController::class, 'order']);
    Route::post('/work/confirm-order/equipment', [App\Http\Controllers\EquipmentController::class, 'confirm_order']);
    Route::post('/equipment/get-similar-product', [App\Http\Controllers\EquipmentController::class, 'get_products']);
    Route::get('/work/order/equipment/edit/{id}', [App\Http\Controllers\EquipmentController::class, 'edit_order']);
    Route::post('/work/order/equipment/confirm/{id}', [App\Http\Controllers\EquipmentController::class, 'confirm_edit_order']);
    Route::post('/work/order/equipment/item/{id}', [App\Http\Controllers\EquipmentController::class, 'edit_order_item']);
    Route::post('/work/order/equipment/confirm/invoices/{id}', [App\Http\Controllers\EquipmentController::class, 'upload_invoices']);
    Route::get('/work/order/equipment/pre-delete/{id}', [App\Http\Controllers\EquipmentController::class, 'pre_delete_order']);
    Route::post('/work/order/equipment/delete/{id}', [App\Http\Controllers\EquipmentController::class, 'delete_order']);
    Route::get('/work/order/equipment/{id}', [App\Http\Controllers\EquipmentController::class, 'show_order']);

});

// test routes
Route::resource('users', ManagementController::class);
Route::get('test', [App\Http\Controllers\ManagementController::class, 'test']);
Route::post('test-upload', [App\Http\Controllers\ManagementController::class, 'testUpload']);
Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generate_pdf']);
Route::post('/test/create', [App\Http\Controllers\ManagementController::class, 'test_create']);
//
