@extends('layout.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Add New Customer</h4>
           <nav class="flex py-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <!-- Dashboard -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('customers.index') }}"
                            class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                            Customers
                        </a>
                    </li>
                    <!-- Separator + Customers -->
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
                <h4 class="card-title">Customer Details</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6">

                        <div class="mb-5">
                            <label for="name" class="text-default-800 text-sm font-medium inline-block mb-2">Full Name</label>
                            <input type="text" id="name" name="name" class="form-input" placeholder="Enter customer full name" required>
                        </div>

                        <div class="mb-5">
                            <label for="customer_id" class="text-default-800 text-sm font-medium inline-block mb-2">Customer ID</label>
                            <div class="flex">
                                <div class="flex items-center justify-center border border-default-200 bg-default-100 px-3 font-semibold rounded-s-md border-e-0">
                                    CUST-
                                </div>
                                <input type="text" id="customer_id" name="customer_id" placeholder="Customer ID" class="form-input rounded-s-none" required />
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="email" class="text-default-800 text-sm font-medium inline-block mb-2">Email Address</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="Enter email address" required>
                        </div>

                        <div class="mb-5">
                            <label for="phone" class="text-default-800 text-sm font-medium inline-block mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-input" placeholder="Enter phone number" required>
                        </div>

                        <div class="mb-5">
                            <label for="company" class="text-default-800 text-sm font-medium inline-block mb-2">Company</label>
                            <input type="text" id="company" name="company" class="form-input" placeholder="Enter company name">
                        </div>

                        <div class="mb-5">
                            <label for="tax_id" class="text-default-800 text-sm font-medium inline-block mb-2">Tax ID</label>
                            <input type="text" id="tax_id" name="tax_id" class="form-input" placeholder="Enter tax identification number">
                        </div>

                        <div class="mb-5">
                            <label for="address" class="text-default-800 text-sm font-medium inline-block mb-2">Street Address</label>
                            <input type="text" id="address" name="address" class="form-input" placeholder="Enter street address" required>
                        </div>

                        <div class="mb-5">
                            <label for="city" class="text-default-800 text-sm font-medium inline-block mb-2">City</label>
                            <input type="text" id="city" name="city" class="form-input" placeholder="Enter city" required>
                        </div>

                        <div class="mb-5">
                            <label for="state" class="text-default-800 text-sm font-medium inline-block mb-2">State/Province</label>
                            <input type="text" id="state" name="state" class="form-input" placeholder="Enter state or province">
                        </div>

                        <div class="mb-5">
                            <label for="postal_code" class="text-default-800 text-sm font-medium inline-block mb-2">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" class="form-input" placeholder="Enter postal code">
                        </div>

                        <div class="mb-5">
                            <label for="country" class="text-default-800 text-sm font-medium inline-block mb-2">Country</label>
                            <select id="country" name="country" class="form-input" required>
                                <option value="">Select Country</option>
                                <option value="United States">United States</option>
                                <option value="Canada">Canada</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Australia">Australia</option>
                                <option value="Germany">Germany</option>
                                <option value="France">France</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="customer_group" class="text-default-800 text-sm font-medium inline-block mb-2">Customer Group</label>
                            <select id="customer_group" name="customer_group" class="form-input">
                                <option value="Regular">Regular</option>
                                <option value="VIP">VIP</option>
                                <option value="Wholesale">Wholesale</option>
                                <option value="Retail">Retail</option>
                            </select>
                        </div>

                        <div class="mb-5 lg:col-span-2">
                            <label for="notes" class="text-default-800 text-sm font-medium inline-block mb-2">Notes</label>
                            <textarea id="notes" name="notes" rows="4" class="form-input" placeholder="Enter any additional notes about the customer..."></textarea>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('customers.index') }}" class="btn bg-default-200 border-default-200 text-default-900 hover:bg-default-300">Cancel</a>
                                <button type="submit" class="btn bg-primary border-primary text-white hover:bg-primary-600">
                                    <i class="i-ph-floppy-disk text-base me-1"></i>
                                    Save Customer
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
