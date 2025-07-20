@extends('layout.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Create New Order</h4>
           <nav class="flex py-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <!-- Dashboard -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('orders.index') }}"
                            class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                            Orders
                        </a>
                    </li>
                    <!-- Separator + Orders -->
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
                <h4 class="card-title">Order Details</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6">

                        <div class="mb-5">
                            <label for="order_number" class="text-default-800 text-sm font-medium inline-block mb-2">Order Number</label>
                            <div class="flex">
                                <div class="flex items-center justify-center border border-default-200 bg-default-100 px-3 font-semibold rounded-s-md border-e-0">
                                    ORD-
                                </div>
                                <input type="text" id="order_number" name="order_number" placeholder="Order Number" class="form-input rounded-s-none" required />
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="customer_id" class="text-default-800 text-sm font-medium inline-block mb-2">Customer</label>
                            <select id="customer_id" name="customer_id" class="form-input" required>
                                <option value="">Select Customer</option>
                                <option value="1">John Doe (CUST-001)</option>
                                <option value="2">Jane Smith (CUST-002)</option>
                                <option value="3">Tech Corp (CUST-003)</option>
                                <option value="4">Global Inc (CUST-004)</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="order_date" class="text-default-800 text-sm font-medium inline-block mb-2">Order Date</label>
                            <input type="date" id="order_date" name="order_date" class="form-input" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-5">
                            <label for="due_date" class="text-default-800 text-sm font-medium inline-block mb-2">Due Date</label>
                            <input type="date" id="due_date" name="due_date" class="form-input">
                        </div>

                        <div class="mb-5">
                            <label for="order_status" class="text-default-800 text-sm font-medium inline-block mb-2">Order Status</label>
                            <select id="order_status" name="order_status" class="form-input" required>
                                <option value="Pending">Pending</option>
                                <option value="Processing">Processing</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="payment_status" class="text-default-800 text-sm font-medium inline-block mb-2">Payment Status</label>
                            <select id="payment_status" name="payment_status" class="form-input" required>
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                                <option value="Partially Paid">Partially Paid</option>
                                <option value="Refunded">Refunded</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="payment_method" class="text-default-800 text-sm font-medium inline-block mb-2">Payment Method</label>
                            <select id="payment_method" name="payment_method" class="form-input">
                                <option value="">Select Payment Method</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="PayPal">PayPal</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Cash">Cash</option>
                                <option value="Check">Check</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="priority" class="text-default-800 text-sm font-medium inline-block mb-2">Priority</label>
                            <select id="priority" name="priority" class="form-input">
                                <option value="Normal">Normal</option>
                                <option value="High">High</option>
                                <option value="Urgent">Urgent</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="subtotal" class="text-default-800 text-sm font-medium inline-block mb-2">Subtotal</label>
                            <div class="relative">
                                <input type="number" id="subtotal" name="subtotal" class="form-input px-8" placeholder="0.00" step="0.01" min="0" required>
                                <div class="absolute inset-y-0 start-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">$</span>
                                </div>
                                <div class="absolute inset-y-0 end-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">USD</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="tax_amount" class="text-default-800 text-sm font-medium inline-block mb-2">Tax Amount</label>
                            <div class="relative">
                                <input type="number" id="tax_amount" name="tax_amount" class="form-input px-8" placeholder="0.00" step="0.01" min="0">
                                <div class="absolute inset-y-0 start-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">$</span>
                                </div>
                                <div class="absolute inset-y-0 end-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">USD</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="shipping_cost" class="text-default-800 text-sm font-medium inline-block mb-2">Shipping Cost</label>
                            <div class="relative">
                                <input type="number" id="shipping_cost" name="shipping_cost" class="form-input px-8" placeholder="0.00" step="0.01" min="0">
                                <div class="absolute inset-y-0 start-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">$</span>
                                </div>
                                <div class="absolute inset-y-0 end-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">USD</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="total_amount" class="text-default-800 text-sm font-medium inline-block mb-2">Total Amount</label>
                            <div class="relative">
                                <input type="number" id="total_amount" name="total_amount" class="form-input px-8" placeholder="0.00" step="0.01" min="0" required>
                                <div class="absolute inset-y-0 start-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">$</span>
                                </div>
                                <div class="absolute inset-y-0 end-4 flex items-center pointer-events-none z-20">
                                    <span class="text-default-500">USD</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5 lg:col-span-2">
                            <label for="shipping_address" class="text-default-800 text-sm font-medium inline-block mb-2">Shipping Address</label>
                            <textarea id="shipping_address" name="shipping_address" rows="3" class="form-input" placeholder="Enter shipping address..."></textarea>
                        </div>

                        <div class="mb-5 lg:col-span-2">
                            <label for="notes" class="text-default-800 text-sm font-medium inline-block mb-2">Order Notes</label>
                            <textarea id="notes" name="notes" rows="4" class="form-input" placeholder="Enter any additional notes for this order..."></textarea>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('orders.index') }}" class="btn bg-default-200 border-default-200 text-default-900 hover:bg-default-300">Cancel</a>
                                <button type="submit" class="btn bg-primary border-primary text-white hover:bg-primary-600">
                                    <i class="i-ph-floppy-disk text-base me-1"></i>
                                    Save Order
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
