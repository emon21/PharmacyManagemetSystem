<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[AuthController::class,'index'])->name('/');

# Authentication Route

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-post', [AuthController::class, 'LoginPost']);
// Route::get('/forgot', [AuthController::class, 'forgot']);

Route::get('/forgot-account', [AuthController::class, 'ForgotAccount'])->name('forgot-account');

Route::post('/forgot-password', [AuthController::class, 'ForgotPassword'])->name('forgot-password');


Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    # User Profile
    Route::get('admin/user/profile', [AuthController::class, 'userProfile'])->name('user.profile');
    Route::post('admin/user/profile/change', [AuthController::class, 'ProfileChange'])->name('profile.change');

    # Customer Route
    // Route::resource('admin/customer', CustomerController::class);
    Route::get('admin/customers', [CustomerController::class, 'index'])->name('customers');

    Route::get('admin/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('admin/customers/store', [CustomerController::class, 'store'])->name('customers.store');

    Route::get('admin/customers/edit/{customer}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('admin/customers/update/{customer}', [CustomerController::class, 'update'])->name('customers.update');

    Route::delete('admin/customers/destroy/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    #show 
    Route::get('admin/customers/show/{customer}', [CustomerController::class, 'show'])->name('customers.show');


    # ============= Medicine Route Start ============= #

    // Route::resource('admin/medicine', MedicineController::class);
    

    Route::get('admin/medicine', [MedicineController::class, 'index'])->name('medicine');

    Route::get('admin/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');

    Route::post('admin/medicine/store', [MedicineController::class, 'store'])->name('medicine.store');

    Route::get('admin/medicine/edit/{medicine}', [MedicineController::class, 'edit'])->name('medicine.edit');

    Route::put('admin/medicine/update/{medicine}', [MedicineController::class, 'update'])->name('medicine.update');

    Route::delete('admin/medicine/destroy/{medicine}', [MedicineController::class, 'destroy'])->name('medicine.destroy');
    
    Route::get('admin/medicine/show/{medicine}', [MedicineController::class, 'show'])->name('medicine.show');


    // Route::get('admin/medicine/search', [MedicineController::class, 'search'])->name('medicine.search');

    Route::get('admin/medicine-stock', [MedicineController::class, 'MedicineStock'])->name('medicine-stock');

    # create
    Route::get('admin/medicine-stock/create',[MedicineController::class, 'MedicineStockCreate'])->name('medicine-stock.create');
    
    # store
    Route::post('admin/medicine-stock/store',[MedicineController::class, 'MedicineStockStore'])->name('medicine-stock.store');

    # edit
    Route::get('admin/medicine-stock/edit/{medicineStock}', [MedicineController::class, 'MedicineStockEdit'])->name('medicine-stock.edit');

    #update
    Route::put('admin/medicine-stock/update/{medicineStock}', [MedicineController::class, 'MedicineStockUpdate'])->name('medicine-stock.update');

    #delete
    Route::delete('admin/medicine-stock/destroy/{medicineStock}', [MedicineController::class, 'MedicineStockDestroy'])->name('medicine-stock.destroy');

    

    // Route::get('admin/medicine/stock', [MedicineController::class, 'stock'])->name('medicine.stock');
    
    // Route::get('admin/medicine/stock/search', [MedicineController::class, 'stockSearch'])->name('medicine.stock.search');
    // Route::get('admin/medicine/stock/report', [MedicineController::class, 'stockReport'])->name('medicine.stock.report');
    // Route::get('admin/medicine/stock/report/pdf', [MedicineController::class, 'stockReportPdf'])->name('medicine.stock.report.pdf');
    // Route::get('admin/medicine/stock/report/excel', [MedicineController::class, 'stockReportExcel'])->name('medicine.stock.report.excel');
    // Route::get('admin/medicine/stock/report/csv', [MedicineController::class, 'stockReportCsv'])->name('medicine.stock.report.csv');
    // Route::get('admin/medicine/stock/report/print', [MedicineController::class, 'stockReportPrint'])->name('medicine.stock.report.print');
    // Route::get('admin/medicine/stock/report/barcode', [MedicineController::class, 'stockReportBarcode'])->name('medicine.stock.report.barcode');
    // Route::get('admin/medicine/stock/report/barcode/pdf', [MedicineController::class, 'stockReportBarcodePdf'])->name('medicine.stock.report.barcode.pdf');
    // Route::get('admin/medicine/stock/report/barcode/excel', [MedicineController::class, 'stockReportBarcodeExcel'])->name('medicine.stock.report.barcode.excel');


    # ============= Medicine Route End ============= #


    # ============= Supplier Route Start ============= #
    Route::get('admin/supplier',[SupplierController::class,'index'])->name('supplier');
    Route::get('admin/supplier/create',[SupplierController::class, 'create'])->name('supplier.create');
    Route::post('admin/supplier/store',[SupplierController::class, 'store'])->name('supplier.store');
    Route::get('admin/supplier/edit/{supplier}',[SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('admin/supplier/update/{supplier}',[SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('admin/supplier/destroy/{supplier}',[SupplierController::class, 'destroy'])->name('supplier.destroy');
   

    # ============= Supplier Route End ============= #

    # ============= Invoice Route Start ============= #

    Route::get('admin/invoice',[InvoiceController::class,'index'])->name('invoice');
    Route::get('admin/invoice/create',[InvoiceController::class,'create'])->name('invoice.create');
    Route::post('admin/invoice/store',[InvoiceController::class,'store'])->name('invoice.store');
    Route::get('admin/invoice/edit/{invoice}',[InvoiceController::class,'edit'])->name('invoice.edit');
    Route::put('admin/invoice/update/{invoice}',[InvoiceController::class,'update'])->name('invoice.update');
    Route::delete('admin/invoice/destroy/{invoice}',[InvoiceController::class,'destroy'])->name('invoice.destroy');
    Route::get('admin/invoice/show/{invoice}',[InvoiceController::class,'show'])->name('invoice.show');


    # ============= Invoice Route End ============= #


    # ============= Purchase Route Start ============= #

    // // All Data show
    // Route::get('admin/purchase', [PurchaseController::class, 'index'])->name('purchase');

    // // Create Method
    // Route::get('admin/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');

    // // Store Method
    // Route::get('admin/purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');

    // // show Method
    // Route::get('admin/purchase/show/{purchase}', [PurchaseController::class, 'show'])->name('purchase.show');

    // // Edit Method
    // Route::get('admin/purchase/edit/{purchase}', [PurchaseController::class, 'edit'])->name('purchase.edit');

    // // Update Method
    // Route::put('admin/purchase/update/{purchase}', [PurchaseController::class, 'update'])->name('purchase.edit');

    // // Delete Method
    // Route::delete('admin/purchase/delete', [PurchaseController::class, 'destroy'])->name('purchase.destroy');

    // // Status Change Method
    // Route::get('admin/purchase/status', [PurchaseController::class, 'status'])->name('purchase.status');


    # route group and prefix

    Route::prefix('admin/purchase')->group(function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('purchase');
        Route::get('/create', [PurchaseController::class, 'create'])->name('purchase.create');
        Route::post('/store', [PurchaseController::class, 'store'])->name('purchase.store');
        Route::get('/edit/{purchase}', [PurchaseController::class, 'edit'])->name('purchase.edit');
        Route::put('/update/{purchase}', [PurchaseController::class, 'update'])->name('purchase.update');
        Route::delete('/destroy/{purchase}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');
        Route::get('/show/{purchase}', [PurchaseController::class, 'show'])->name('purchase.show');
    });






    // purchase
    # ============= Purchase Route End ============= #
    
    # Logout
    Route::post('logout', [AuthController::class, 'logout']);

});


# ================== Backend Route ================== #


# Backend prefix and group route

// Route::prefix('admin')->group(function () {

//     // route for admin dashboard
// });

# ================== Frontend Route ================== #

// Route::prefix('frontend')->group(function () {

//     // route for frontend

// });
