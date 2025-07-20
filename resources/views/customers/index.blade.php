@extends('layout.app')

@section('content')

    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Customer Management</h4>
           <nav class="flex py-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <!-- Dashboard -->
        <li class="inline-flex items-center">
            <a href="{{ route('dashboard') }}"
               class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                Dashboard
            </a>
        </li>
        <!-- Separator + Customers -->
        <li>
            <div class="flex items-center">
                <!-- Black SVG caret separator -->
                <span class="mx-2" aria-hidden="true">
                    <svg class="w-4 h-4" fill="none" stroke="black" stroke-width="2" viewBox="0 0 16 16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 4l4 4-4 4"/>
                    </svg>
                </span>
                <span class="ml-1 text-default-500 md:ml-2 font-semibold" aria-current="page">
                    Customers
                </span>
            </div>
        </li>
    </ol>
</nav>

        </div>
        <a href="{{ route('customers.create') }}" class="btn bg-primary border-primary text-white hover:bg-primary-600">
            <i class="i-ph-plus text-base me-1"></i>
            Add New Customer
        </a>
    </div>
    <!-- end page title -->

    <div class="grid xl:grid-cols-1 gap-6">
        <div class="card overflow-hidden">
            <div class="card-header">
                <h4 class="card-title">All Customers</h4>
            </div>

            <div class="overflow-x-auto custom-scroll">
                <div class="min-w-full inline-block align-middle whitespace-nowrap">
                    <div class="overflow-hidden">
                        <table class="w-full text-sm text-left text-default-500">
                            <thead class="text-xs text-default-700 uppercase bg-default-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Customer Name</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Phone</th>
                                    <th scope="col" class="px-6 py-3">Company</th>
                                    <th scope="col" class="px-6 py-3">Location</th>
                                    <th scope="col" class="px-6 py-3">Total Orders</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach($customers as $customer)
                                <tr class="bg-white hover:bg-default-50 transition-all">
                                    <td class="px-6 py-4 font-medium text-default-900 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                                                    <span class="text-primary-600 font-medium text-sm">{{ substr($customer['name'], 0, 2) }}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-medium text-default-900">{{ $customer['name'] }}</div>
                                                <div class="text-default-500 text-sm">{{ $customer['customer_id'] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer['email'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer['phone'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer['company'] ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer['city'] }}, {{ $customer['country'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $customer['total_orders'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if($customer['status'] == 'Inactive') bg-red-100 text-red-800
                                            @elseif($customer['status'] == 'Pending') bg-yellow-100 text-yellow-800
                                            @else bg-green-100 text-green-800
                                            @endif">
                                            {{ $customer['status'] }}
                                        </span>
                                    </td>
                                   <td class="px-6 py-4 text-center">
    <div class="flex items-center justify-center gap-2">
        <!-- Edit Button -->
        <a href="{{ route('customers.edit', $customer['id']) }}"
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
                data-id="{{ $customer['id'] }}"
                data-name="{{ $customer['name'] }}">
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
            
            console.log('Customer ID:', itemId, 'Customer Name:', itemName); // Debug log
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to delete customer "${itemName}"? This action cannot be undone!`,
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
                    fetch(`/customers/${itemId}`, {
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
                                text: 'Customer has been deleted successfully.',
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
