@extends('layout.app')

@section('content')

    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Order Management</h4>
           <nav class="flex py-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <!-- Dashboard -->
        <li class="inline-flex items-center">
            <a href="{{ route('dashboard') }}"
               class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                Dashboard
            </a>
        </li>
        <!-- Separator + Orders -->
        <li>
            <div class="flex items-center">
                <!-- Black SVG caret separator -->
                <span class="mx-2" aria-hidden="true">
                    <svg class="w-4 h-4" fill="none" stroke="black" stroke-width="2" viewBox="0 0 16 16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 4l4 4-4 4"/>
                    </svg>
                </span>
                <span class="ml-1 text-default-500 md:ml-2 font-semibold" aria-current="page">
                    Orders
                </span>
            </div>
        </li>
    </ol>
</nav>

        </div>
        <a href="{{ route('orders.create') }}" class="btn bg-primary border-primary text-white hover:bg-primary-600">
            <i class="i-ph-plus text-base me-1"></i>
            Create New Order
        </a>
    </div>
    <!-- end page title -->

    <div class="grid xl:grid-cols-1 gap-6">
        <div class="card overflow-hidden">
            <div class="card-header">
                <h4 class="card-title">All Orders</h4>
            </div>

            <div class="overflow-x-auto custom-scroll">
                <div class="min-w-full inline-block align-middle whitespace-nowrap">
                    <div class="overflow-hidden">
                        <table class="w-full text-sm text-left text-default-500">
                            <thead class="text-xs text-default-700 uppercase bg-default-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Order ID</th>
                                    <th scope="col" class="px-6 py-3">Customer</th>
                                    <th scope="col" class="px-6 py-3">Order Date</th>
                                    <th scope="col" class="px-6 py-3">Items</th>
                                    <th scope="col" class="px-6 py-3">Total Amount</th>
                                    <th scope="col" class="px-6 py-3">Payment Status</th>
                                    <th scope="col" class="px-6 py-3">Order Status</th>
                                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach($orders as $order)
                                <tr class="bg-white hover:bg-default-50 transition-all">
                                    <td class="px-6 py-4 font-medium text-default-900 whitespace-nowrap">
                                        <code class="bg-default-100 px-2 py-1 rounded text-xs">{{ $order['order_number'] }}</code>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="flex-shrink-0 h-8 w-8">
                                                <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center">
                                                    <span class="text-primary-600 font-medium text-xs">{{ substr($order['customer_name'], 0, 2) }}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-medium text-default-900">{{ $order['customer_name'] }}</div>
                                                <div class="text-default-500 text-sm">{{ $order['customer_email'] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-default-900">{{ $order['order_date'] }}</div>
                                        <div class="text-default-500 text-sm">{{ $order['order_time'] }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $order['total_items'] }} items
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-default-900">${{ number_format($order['total_amount'], 2) }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if($order['payment_status'] == 'Paid') bg-green-100 text-green-800
                                            @elseif($order['payment_status'] == 'Pending') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ $order['payment_status'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if($order['status'] == 'Delivered') bg-green-100 text-green-800
                                            @elseif($order['status'] == 'Processing') bg-blue-100 text-blue-800
                                            @elseif($order['status'] == 'Shipped') bg-purple-100 text-purple-800
                                            @elseif($order['status'] == 'Cancelled') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800
                                            @endif">
                                            {{ $order['status'] }}
                                        </span>
                                    </td>
                                   <td class="px-6 py-4 text-center">
    <div class="flex items-center justify-center gap-2">
        <!-- View Button -->
        <a href="{{ route('orders.show', $order['id']) }}"
           class="inline-flex items-center justify-center w-8 h-8 border-2 border-blue-400 text-blue-500 bg-transparent rounded-lg
                  hover:border-blue-600 hover:bg-blue-50 hover:text-blue-700
                  transition-colors duration-200 focus:ring-2 focus:ring-blue-300">
            <!-- Eye SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </a>
        <!-- Edit Button -->
        <a href="{{ route('orders.edit', $order['id']) }}"
           class="inline-flex items-center justify-center w-8 h-8 border-2 border-primary-400 text-primary-500 bg-transparent rounded-lg
                  hover:border-primary-600 hover:bg-primary-50 hover:text-primary-700
                  transition-colors duration-200 focus:ring-2 focus:ring-primary-300">
            <!-- Pencil SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M16.862 3.487a2.075 2.075 0 1 1 2.937 2.937L8.22 17.002l-3.499.563.564-3.5 11.577-11.578z"/>
            </svg>
        </a>
        <!-- Delete Button -->
        <button type="button"
                class="inline-flex items-center justify-center w-8 h-8 border-2 border-red-400 text-red-500 bg-transparent rounded-lg
                       hover:border-red-600 hover:bg-red-50 hover:text-red-700
                       transition-colors duration-200 focus:ring-2 focus:ring-red-300 delete-btn"
                data-id="{{ $order['id'] }}"
                data-name="{{ $order['order_number'] }}">
            <!-- Trash SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7L5 7M6 7V19a2 2 0 002 2h8a2 2 0 002-2V7M9 7V4a2 2 0 012-2h2a2 2 0 012 2v3" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 11v6M14 11v6" />
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

@endsection

@push('scripts')
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if SweetAlert2 is loaded
    if (typeof Swal === 'undefined') {
        console.error('SweetAlert2 is not loaded');
        return;
    }

    // Check if CSRF token exists
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        console.error('CSRF token meta tag not found');
        return;
    }

    // Delete confirmation with Sweet Alert
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            console.log('Delete button clicked'); // Debug log
            
            const itemId = this.getAttribute('data-id');
            const itemName = this.getAttribute('data-name');
            
            console.log('Order ID:', itemId, 'Order Number:', itemName); // Debug log
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to delete order "${itemName}"? This action cannot be undone!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                customClass: {
                    container: 'rounded-lg',
                    popup: 'rounded-lg',
                    actions: 'rounded-lg'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform delete action
                    fetch(`/orders/${itemId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Order has been deleted successfully.',
                                icon: 'success',
                                customClass: {
                                    container: 'rounded-lg',
                                    popup: 'rounded-lg'
                                }
                            }).then(() => {
                                location.reload();
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Delete error:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong. Please try again.',
                            icon: 'error',
                            customClass: {
                                container: 'rounded-lg',
                                popup: 'rounded-lg'
                            }
                        });
                    });
                }
            });
        });
    });
});
</script>
@endpush
