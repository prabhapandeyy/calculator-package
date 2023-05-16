<?php
use Illuminate\Support\Facades\Route;

Route::get('calculator',function(){
    echo "hlw from calculator package";
});
Route::get('index',[LP\Calculator\CalculatorController::class,'index']);
Route::get('create',[LP\Calculator\CalculatorController::class,'create']);
Route::post('store',[LP\Calculator\CalculatorController::class,'store']);
Route::DELETE('user/delete/{id}', [LP\Calculator\CalculatorController::class, 'destroy']);
Route::get('user/edit/{id}', [LP\Calculator\CalculatorController::class, 'edit']);
Route::post('user/update/{id}', [LP\Calculator\CalculatorController::class, 'update']);

// inventory

Route::get('inventory/index',[LP\Calculator\InventoryController::class,'index'])->name('inventory.index');
Route::get('inventory/create',[LP\Calculator\InventoryController::class,'create'])->name('inventory.create');
Route::post('inventory/store',[LP\Calculator\InventoryController::class,'store'])->name('inventory.store');
Route::get('inventory/edit/{id}',[LP\Calculator\InventoryController::class,'edit'])->name('inventory.edit');
Route::post('inventory/update/{id}', [LP\Calculator\InventoryController::class, 'update'])->name('inventory.update');
Route::DELETE('inventory/destroy/{id}', [LP\Calculator\InventoryController::class, 'destroy'])->name('inventory.destroy');

// invoice category

Route::get('invoiceCategory/index',[LP\Calculator\InvoiceCategoryController::class,'index'])->name('invoiceCategory.index');
Route::get('invoiceCategory/create',[LP\Calculator\InvoiceCategoryController::class,'create'])->name('invoiceCategory.create');
Route::post('invoiceCategory/store',[LP\Calculator\InvoiceCategoryController::class,'store'])->name('invoiceCategory.store');
Route::get('invoiceCategory/edit/{id}',[LP\Calculator\InvoiceCategoryController::class,'edit'])->name('invoiceCategory.edit');
Route::post('invoiceCategory/update/{id}', [LP\Calculator\InvoiceCategoryController::class, 'update'])->name('invoiceCategory.update');
Route::DELETE('invoiceCategory/destroy/{id}', [LP\Calculator\InvoiceCategoryController::class, 'destroy'])->name('invoiceCategory.destroy');

// payment method

Route::get('paymentMethod/index',[LP\Calculator\PaymentMethodController::class,'index'])->name('paymentMethod.index');
Route::get('paymentMethod/create',[LP\Calculator\PaymentMethodController::class,'create'])->name('paymentMethod.create');
Route::post('paymentMethod/store',[LP\Calculator\PaymentMethodController::class,'store'])->name('paymentMethod.store');
Route::get('paymentMethod/edit/{id}',[LP\Calculator\PaymentMethodController::class,'edit'])->name('paymentMethod.edit');
Route::post('paymentMethod/update/{id}', [LP\Calculator\PaymentMethodController::class, 'update'])->name('paymentMethod.update');
Route::DELETE('paymentMethod/destroy/{id}', [LP\Calculator\PaymentMethodController::class, 'destroy'])->name('paymentMethod.destroy');

// invoice

Route::get('invoice/index',[LP\Calculator\InvoiceController::class,'index'])->name('invoice.index');
Route::get('invoice/create',[LP\Calculator\InvoiceController::class,'create'])->name('invoice.create');
Route::post('invoice/store',[LP\Calculator\InvoiceController::class,'store'])->name('invoice.store');
Route::get('invoice/edit/{id}',[LP\Calculator\InvoiceController::class,'edit'])->name('invoice.edit');
Route::post('invoice/update/{id}', [LP\Calculator\InvoiceController::class, 'update'])->name('invoice.update');
Route::DELETE('invoice/destroy/{id}', [LP\Calculator\InvoiceController::class, 'destroy'])->name('invoice.destroy');