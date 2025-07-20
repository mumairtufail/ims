<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UnderConstructionController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Inventory Management Routes
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');
Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

// Products Management Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Customers Management Routes
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// Orders Management Routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Shipping Management Routes
Route::get('/shipping', [ShippingController::class, 'index'])->name('shipping.index');
Route::get('/shipping/create', [ShippingController::class, 'create'])->name('shipping.create');
Route::post('/shipping/store', [ShippingController::class, 'store'])->name('shipping.store');
Route::get('/shipping/{id}', [ShippingController::class, 'show'])->name('shipping.show');
Route::get('/shipping/{id}/edit', [ShippingController::class, 'edit'])->name('shipping.edit');
Route::put('/shipping/{id}', [ShippingController::class, 'update'])->name('shipping.update');
Route::delete('/shipping/{id}', [ShippingController::class, 'destroy'])->name('shipping.destroy');

// Settings Management Routes
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

// Under Construction Routes (for features not yet implemented)
Route::get('/under-construction', [UnderConstructionController::class, 'index'])->name('under-construction');

// Categories Routes (Under Construction)
Route::get('/categories', [UnderConstructionController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [UnderConstructionController::class, 'index'])->name('categories.create');
Route::get('/categories/{id}/edit', [UnderConstructionController::class, 'index'])->name('categories.edit');

// Warehouse Routes (Under Construction)
Route::get('/warehouse', [UnderConstructionController::class, 'index'])->name('warehouse.index');
Route::get('/warehouse/stock-in', [UnderConstructionController::class, 'index'])->name('warehouse.stock-in');
Route::get('/warehouse/stock-out', [UnderConstructionController::class, 'index'])->name('warehouse.stock-out');
Route::get('/warehouse/transfer', [UnderConstructionController::class, 'index'])->name('warehouse.transfer');
Route::get('/warehouse/adjustments', [UnderConstructionController::class, 'index'])->name('warehouse.adjustments');

// Suppliers Routes (Under Construction)
Route::get('/suppliers', [UnderConstructionController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [UnderConstructionController::class, 'index'])->name('suppliers.create');
Route::get('/suppliers/{id}/edit', [UnderConstructionController::class, 'index'])->name('suppliers.edit');
Route::get('/suppliers/purchase-orders', [UnderConstructionController::class, 'index'])->name('suppliers.purchase-orders');

// Reports Routes (Under Construction)
Route::get('/reports', [UnderConstructionController::class, 'index'])->name('reports.index');
Route::get('/reports/inventory', [UnderConstructionController::class, 'index'])->name('reports.inventory');
Route::get('/reports/stock-movement', [UnderConstructionController::class, 'index'])->name('reports.stock-movement');
Route::get('/reports/low-stock', [UnderConstructionController::class, 'index'])->name('reports.low-stock');
Route::get('/reports/valuation', [UnderConstructionController::class, 'index'])->name('reports.valuation');

// Analytics Routes (Under Construction)
Route::get('/analytics', [UnderConstructionController::class, 'index'])->name('analytics.index');
Route::get('/analytics/dashboard', [UnderConstructionController::class, 'index'])->name('analytics.dashboard');
Route::get('/analytics/trends', [UnderConstructionController::class, 'index'])->name('analytics.trends');

// Shipping Track Route (Under Construction)
Route::get('/shipping/track', [UnderConstructionController::class, 'index'])->name('shipping.track');
Route::get('/shipping/methods', [UnderConstructionController::class, 'index'])->name('shipping.methods');
Route::get('/shipping/zones', [UnderConstructionController::class, 'index'])->name('shipping.zones');