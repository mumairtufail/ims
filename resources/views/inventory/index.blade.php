@extends('layout.app')

@section('content')
    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Inventory Management</h4>
            <nav class="flex py-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <!-- Dashboard -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                            Dashboard
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
                                Inventory
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <a href="{{ route('inventory.create') }}" class="btn bg-primary border-primary text-white hover:bg-primary-600">
            <i class="i-ph-plus text-base me-1"></i>
            Add New Item
        </a>
    </div>
    <!-- end page title -->

    <div class="grid xl:grid-cols-1 gap-6">
        <div class="card overflow-hidden">
            <div class="card-header">
                <h4 class="card-title">Inventory Items</h4>
            </div>

            <div class="overflow-x-auto custom-scroll">
                <div class="min-w-full inline-block align-middle whitespace-nowrap">
                    <div class="overflow-hidden">
                        <table class="w-full text-sm text-left text-default-500">
                            <thead class="text-xs text-default-700 uppercase bg-default-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Product Name</th>
                                    <th scope="col" class="px-6 py-3">SKU</th>
                                    <th scope="col" class="px-6 py-3">Category</th>
                                    <th scope="col" class="px-6 py-3">Quantity</th>
                                    <th scope="col" class="px-6 py-3">Unit Price</th>
                                    <th scope="col" class="px-6 py-3">Total Value</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($inventoryItems as $item)
                                    <tr class="bg-white hover:bg-default-50 transition-all">
                                        <td class="px-6 py-4 font-medium text-default-900 whitespace-nowrap">
                                            {{ $item['name'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <code
                                                class="bg-default-100 px-2 py-1 rounded text-xs">{{ $item['sku'] }}</code>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item['category'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if ($item['quantity'] <= 5) bg-red-100 text-red-800
                                            @elseif($item['quantity'] <= 10) bg-yellow-100 text-yellow-800
                                            @else bg-green-100 text-green-800 @endif">
                                                {{ $item['quantity'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="font-medium">${{ number_format($item['unit_price'], 2) }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="font-semibold text-default-900">${{ number_format($item['total_value'], 2) }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if ($item['status'] == 'Critical') bg-red-100 text-red-800
                                            @elseif($item['status'] == 'Low Stock') bg-yellow-100 text-yellow-800
                                            @else bg-green-100 text-green-800 @endif">
                                                {{ $item['status'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('inventory.edit', $item['id']) }}"
                                                    class="inline-flex items-center justify-center w-8 h-8 border-2 border-primary-400 text-primary-500 bg-transparent rounded-lg
                  hover:border-primary-600 hover:bg-primary-50 hover:text-primary-700
                  transition-colors duration-200 focus:ring-2 focus:ring-primary-300">
                                                    <!-- Pencil SVG Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path
                                                            d="M16.862 3.487a2.075 2.075 0 1 1 2.937 2.937L8.22 17.002l-3.499.563.564-3.5 11.577-11.578z" />
                                                    </svg>
                                                </a>
                                                <!-- Delete Button -->
                                                <button type="button"
                                                    class="inline-flex items-center justify-center w-8 h-8 border-2 border-red-400 text-red-500 bg-transparent rounded-lg
                       hover:border-red-600 hover:bg-red-50 hover:text-red-700
                       transition-colors duration-200 focus:ring-2 focus:ring-red-300 delete-btn"
                                                    data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}">
                                                    <!-- Trash SVG Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7L5 7M6 7V19a2 2 0 002 2h8a2 2 0 002-2V7M9 7V4a2 2 0 012-2h2a2 2 0 012 2v3" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M10 11v6M14 11v6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>

    @include('partials.sweet-alert-delete')
@endsection
