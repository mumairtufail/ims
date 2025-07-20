@extends('layout.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Create New Shipment</h4>
           <nav class="flex py-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <!-- Dashboard -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('shipping.index') }}"
                            class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                            Shipping
                        </a>
                    </li>
                    <!-- Separator + Shipping -->
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
                <h4 class="card-title">Shipment Details</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('shipping.store') }}" method="POST">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6">

                        <div class="mb-5">
                            <label for="shipment_id" class="text-default-800 text-sm font-medium inline-block mb-2">Shipment ID</label>
                            <div class="flex">
                                <div class="flex items-center justify-center border border-default-200 bg-default-100 px-3 font-semibold rounded-s-md border-e-0">
                                    SHIP-
                                </div>
                                <input type="text" id="shipment_id" name="shipment_id" placeholder="Shipment ID" class="form-input rounded-s-none" required />
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="order_id" class="text-default-800 text-sm font-medium inline-block mb-2">Order</label>
                            <select id="order_id" name="order_id" class="form-input" required>
                                <option value="">Select Order</option>
                                <option value="1">ORD-001 - John Doe</option>
                                <option value="2">ORD-002 - Jane Smith</option>
                                <option value="3">ORD-003 - Tech Corp</option>
                                <option value="4">ORD-004 - Global Inc</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="carrier" class="text-default-800 text-sm font-medium inline-block mb-2">Shipping Carrier</label>
                            <select id="carrier" name="carrier" class="form-input" required>
                                <option value="">Select Carrier</option>
                                <option value="FedEx">FedEx</option>
                                <option value="UPS">UPS</option>
                                <option value="DHL">DHL</option>
                                <option value="USPS">USPS</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="tracking_number" class="text-default-800 text-sm font-medium inline-block mb-2">Tracking Number</label>
                            <input type="text" id="tracking_number" name="tracking_number" class="form-input" placeholder="Enter tracking number" required>
                        </div>

                        <div class="mb-5">
                            <label for="ship_date" class="text-default-800 text-sm font-medium inline-block mb-2">Ship Date</label>
                            <input type="date" id="ship_date" name="ship_date" class="form-input" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-5">
                            <label for="estimated_delivery" class="text-default-800 text-sm font-medium inline-block mb-2">Estimated Delivery</label>
                            <input type="date" id="estimated_delivery" name="estimated_delivery" class="form-input">
                        </div>

                        <div class="mb-5">
                            <label for="shipping_method" class="text-default-800 text-sm font-medium inline-block mb-2">Shipping Method</label>
                            <select id="shipping_method" name="shipping_method" class="form-input" required>
                                <option value="">Select Method</option>
                                <option value="Standard">Standard</option>
                                <option value="Express">Express</option>
                                <option value="Overnight">Overnight</option>
                                <option value="Two Day">Two Day</option>
                                <option value="Ground">Ground</option>
                            </select>
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
                            <label for="weight" class="text-default-800 text-sm font-medium inline-block mb-2">Package Weight</label>
                            <div class="flex rounded-md shadow-sm">
                                <input type="number" id="weight" name="weight" class="form-input rounded-e-none" placeholder="0.00" step="0.01" min="0">
                                <div class="px-4 inline-flex items-center min-w-fit rounded-e-md border border-s-0 border-default-200 bg-default-50">
                                    <span class="text-sm text-default-500">kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="dimensions" class="text-default-800 text-sm font-medium inline-block mb-2">Package Dimensions</label>
                            <input type="text" id="dimensions" name="dimensions" class="form-input" placeholder="e.g., 30 x 20 x 15 cm">
                        </div>

                        <div class="mb-5">
                            <label for="status" class="text-default-800 text-sm font-medium inline-block mb-2">Shipment Status</label>
                            <select id="status" name="status" class="form-input" required>
                                <option value="Pending">Pending</option>
                                <option value="Picked Up">Picked Up</option>
                                <option value="In Transit">In Transit</option>
                                <option value="Out for Delivery">Out for Delivery</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Exception">Exception</option>
                                <option value="Returned">Returned</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="insurance_value" class="text-default-800 text-sm font-medium inline-block mb-2">Insurance Value</label>
                            <div class="relative">
                                <input type="number" id="insurance_value" name="insurance_value" class="form-input px-8" placeholder="0.00" step="0.01" min="0">
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
                            <textarea id="shipping_address" name="shipping_address" rows="3" class="form-input" placeholder="Enter complete shipping address..." required></textarea>
                        </div>

                        <div class="mb-5 lg:col-span-2">
                            <label for="notes" class="text-default-800 text-sm font-medium inline-block mb-2">Shipment Notes</label>
                            <textarea id="notes" name="notes" rows="4" class="form-input" placeholder="Enter any special instructions or notes..."></textarea>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('shipping.index') }}" class="btn bg-default-200 border-default-200 text-default-900 hover:bg-default-300">Cancel</a>
                                <button type="submit" class="btn bg-primary border-primary text-white hover:bg-primary-600">
                                    <i class="i-ph-floppy-disk text-base me-1"></i>
                                    Create Shipment
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
