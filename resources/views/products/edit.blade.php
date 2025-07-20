@extends('layout.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Edit Product</h4>
            <nav class="flex py-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <!-- Dashboard -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('products.index') }}"
                            class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                            Products
                        </a>
                    </li>
                    <!-- Separator + Products -->
                    <li>
                        <div class="flex items-center">
                            <!-- Black SVG caret separator -->
                            <span class="mx-2" aria-hidden="true">
                                <svg class="w-4 h-4" fill="none" stroke="black" stroke-width="2" viewBox="0 0 16 16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 4l4 4-4 4" />
                                </svg>
                            </span>
                            <span class="ml-1 text-default-500 md:ml-2 font-semibold" aria-current="page">
                                Edit
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
                <h4 class="card-title">Product Details</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('products.update', $product['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid lg:grid-cols-2 gap-6">

                        <div class="mb-5">
                            <label for="name" class="text-default-800 text-sm font-medium inline-block mb-2">Product Name</label>
                            <input type="text" id="name" name="name" class="form-input" placeholder="Enter product name" value="{{ $product['name'] }}" required>
                        </div>

                        <div class="mb-5">
                            <label for="sku" class="text-default-800 text-sm font-medium inline-block mb-2">SKU</label>
                            <div class="flex">
                                <div class="flex items-center justify-center border border-default-200 bg-default-100 px-3 font-semibold rounded-s-md border-e-0">
                                    PRD-
                                </div>
                                <input type="text" id="sku" name="sku" placeholder="Product SKU" class="form-input rounded-s-none" value="{{ $product['sku'] }}" required />
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="category" class="text-default-800 text-sm font-medium inline-block mb-2">Category</label>
                            <select id="category" name="category" class="form-input" required>
                                <option value="">Select Category</option>
                                <option value="Electronics" {{ $product['category'] == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                <option value="Mobile Phones" {{ $product['category'] == 'Mobile Phones' ? 'selected' : '' }}>Mobile Phones</option>
                                <option value="Computers" {{ $product['category'] == 'Computers' ? 'selected' : '' }}>Computers</option>
                                <option value="Accessories" {{ $product['category'] == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                                <option value="Gaming" {{ $product['category'] == 'Gaming' ? 'selected' : '' }}>Gaming</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="brand" class="text-default-800 text-sm font-medium inline-block mb-2">Brand</label>
                            <input type="text" id="brand" name="brand" class="form-input" placeholder="Enter brand name" value="{{ $product['brand'] }}" required>
                        </div>

                        <div class="mb-5">
                            <label for="price" class="text-default-800 text-sm font-medium inline-block mb-2">Price</label>
                            <div class="relative">
                                <input type="number" id="price" name="price" class="form-input px-8" placeholder="0.00" step="0.01" min="0" value="{{ $product['price'] }}" required>
                                <div class="absolute inset-y-0 start-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">$</span>
                                </div>
                                <div class="absolute inset-y-0 end-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">USD</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="cost_price" class="text-default-800 text-sm font-medium inline-block mb-2">Cost Price</label>
                            <div class="relative">
                                <input type="number" id="cost_price" name="cost_price" class="form-input px-8" placeholder="0.00" step="0.01" min="0" value="{{ $product['cost_price'] ?? '' }}">
                                <div class="absolute inset-y-0 start-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">$</span>
                                </div>
                                <div class="absolute inset-y-0 end-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">USD</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="stock_quantity" class="text-default-800 text-sm font-medium inline-block mb-2">Stock Quantity</label>
                            <input type="number" id="stock_quantity" name="stock_quantity" class="form-input" placeholder="0" min="0" value="{{ $product['stock'] }}" required>
                        </div>

                        <div class="mb-5">
                            <label for="weight" class="text-default-800 text-sm font-medium inline-block mb-2">Weight</label>
                            <div class="flex rounded-md shadow-sm">
                                <input type="number" id="weight" name="weight" class="form-input rounded-e-none" placeholder="0.00" step="0.01" min="0" value="{{ $product['weight'] ?? '' }}">
                                <div class="px-4 inline-flex items-center min-w-fit rounded-e-md border border-s-0 border-default-200 bg-default-50">
                                    <span class="text-sm text-default-500">kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="dimensions" class="text-default-800 text-sm font-medium inline-block mb-2">Dimensions (L x W x H)</label>
                            <input type="text" id="dimensions" name="dimensions" class="form-input" placeholder="e.g., 10 x 5 x 2 cm" value="{{ $product['dimensions'] ?? '' }}">
                        </div>

                        <div class="mb-5">
                            <label for="status" class="text-default-800 text-sm font-medium inline-block mb-2">Status</label>
                            <select id="status" name="status" class="form-input" required>
                                <option value="Active" {{ $product['status'] == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $product['status'] == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="Discontinued" {{ $product['status'] == 'Discontinued' ? 'selected' : '' }}>Discontinued</option>
                            </select>
                        </div>

                        <div class="mb-5 lg:col-span-2">
                            <label for="description" class="text-default-800 text-sm font-medium inline-block mb-2">Description</label>
                            <textarea id="description" name="description" rows="4" class="form-input" placeholder="Enter product description...">{{ $product['description'] ?? '' }}</textarea>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('products.index') }}" class="btn bg-default-200 border-default-200 text-default-900 hover:bg-default-300">Cancel</a>
                                <button type="submit" class="btn bg-primary border-primary text-white hover:bg-primary-600">
                                    <i class="i-ph-floppy-disk text-base me-1"></i>
                                    Update Product
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
