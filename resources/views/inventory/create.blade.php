@extends('layout.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Add New Inventory Item</h4>
           <nav class="flex py-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <!-- Dashboard -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('inventory.index') }}"
                            class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                            Inventory
                        </a>
                    </li>
                    <!-- Separator + Inventory -->
                    <li>
                        <div class="flex items-center">
                            <!-- Black SVG caret separator -->
                            <span class="mx-2" aria-hidden="true">
                                <svg class="w-4 h-4" fill="none" stroke="black" stroke-width="2" viewBox="0 0 16 16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 4l4 4-4 4" />
                                </svg>
                            </span>
                            <span class="ml-1 text-default-500 md:ml-2 font-semibold" aria-current="page">
                                Create
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end page title -->

    <div class="grid xl:grid-cols-1 gap-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Item Details</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('inventory.store') }}" method="POST">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6">

                        <div class="mb-5">
                            <label for="name" class="text-default-800 text-sm font-medium inline-block mb-2">Product Name</label>
                            <input type="text" id="name" name="name" class="form-input" placeholder="Enter product name" required>
                        </div>

                        <div class="mb-5">
                            <label for="sku" class="text-default-800 text-sm font-medium inline-block mb-2">SKU</label>
                            <div class="flex">
                                <div class="flex items-center justify-center border border-default-200 bg-default-100 px-3 font-semibold rounded-s-md border-e-0">
                                    SKU-
                                </div>
                                <input type="text" id="sku" name="sku" placeholder="Product SKU" class="form-input rounded-s-none" required />
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="category" class="text-default-800 text-sm font-medium inline-block mb-2">Category</label>
                            <select id="category" name="category" class="form-input" required>
                                <option value="">Select Category</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Mobile Phones">Mobile Phones</option>
                                <option value="Monitors">Monitors</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Furniture">Furniture</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="brand" class="text-default-800 text-sm font-medium inline-block mb-2">Brand</label>
                            <input type="text" id="brand" name="brand" class="form-input" placeholder="Enter brand name">
                        </div>

                        <div class="mb-5">
                            <label for="quantity" class="text-default-800 text-sm font-medium inline-block mb-2">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-input" placeholder="0" min="0" required>
                        </div>

                        <div class="mb-5">
                            <label for="unit_price" class="text-default-800 text-sm font-medium inline-block mb-2">Unit Price</label>
                            <div class="relative">
                                <input type="number" id="unit_price" name="unit_price" class="form-input px-8" placeholder="0.00" step="0.01" min="0" required>
                                <div class="absolute inset-y-0 start-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">$</span>
                                </div>
                                <div class="absolute inset-y-0 end-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">USD</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="min_stock_level" class="text-default-800 text-sm font-medium inline-block mb-2">Minimum Stock Level</label>
                            <input type="number" id="min_stock_level" name="min_stock_level" class="form-input" placeholder="5" min="0">
                        </div>

                        <div class="mb-5">
                            <label for="location" class="text-default-800 text-sm font-medium inline-block mb-2">Storage Location</label>
                            <div class="flex rounded-md shadow-sm">
                                <div class="px-4 inline-flex items-center min-w-fit rounded-l-md border border-e-0 border-default-200 bg-default-50">
                                    <span class="text-sm text-default-500">Warehouse</span>
                                </div>
                                <input type="text" id="location" name="location" class="form-input" placeholder="A-1-001">
                            </div>
                        </div>

                        <div class="mb-5 lg:col-span-2">
                            <label for="description" class="text-default-800 text-sm font-medium inline-block mb-2">Description</label>
                            <textarea id="description" name="description" rows="4" class="form-input" placeholder="Enter product description..."></textarea>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('inventory.index') }}" class="btn bg-default-200 border-default-200 text-default-900 hover:bg-default-300">Cancel</a>
                                <button type="submit" class="btn bg-primary border-primary text-white hover:bg-primary-600">
                                    <i class="i-ph-floppy-disk text-base me-1"></i>
                                    Save Item
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div> <!-- end card -->
    </div>

</div> <!-- container -->
@endsection
