<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        // Static data for now
        $shipments = [
            [
                'id' => 1,
                'shipment_id' => 'SHP-001',
                'order_number' => 'ORD-2024-001',
                'tracking_number' => 'FDX123456789',
                'carrier' => 'FedEx',
                'customer_name' => 'John Smith',
                'customer_phone' => '+1 (555) 123-4567',
                'destination' => 'New York, NY 10001',
                'ship_date' => '2024-03-16',
                'estimated_delivery' => '2024-03-18',
                'status' => 'In Transit',
                'package_weight' => '5.2 kg',
                'package_dimensions' => '40x30x15 cm'
            ],
            [
                'id' => 2,
                'shipment_id' => 'SHP-002',
                'order_number' => 'ORD-2024-003',
                'tracking_number' => 'UPS987654321',
                'carrier' => 'UPS',
                'customer_name' => 'Michael Brown',
                'customer_phone' => '+1 (555) 456-7890',
                'destination' => 'Dallas, TX 75001',
                'ship_date' => '2024-03-12',
                'estimated_delivery' => '2024-03-14',
                'status' => 'Delivered',
                'package_weight' => '3.8 kg',
                'package_dimensions' => '35x25x20 cm'
            ],
            [
                'id' => 3,
                'shipment_id' => 'SHP-003',
                'order_number' => 'ORD-2024-004',
                'tracking_number' => 'DHL456789123',
                'carrier' => 'DHL',
                'customer_name' => 'Emily Davis',
                'customer_phone' => '+1 (555) 321-0987',
                'destination' => 'Seattle, WA 98101',
                'ship_date' => '2024-03-08',
                'estimated_delivery' => '2024-03-11',
                'status' => 'Delivered',
                'package_weight' => '12.5 kg',
                'package_dimensions' => '60x40x25 cm'
            ],
            [
                'id' => 4,
                'shipment_id' => 'SHP-004',
                'order_number' => 'ORD-2024-006',
                'tracking_number' => 'USPS789123456',
                'carrier' => 'USPS',
                'customer_name' => 'Lisa Anderson',
                'customer_phone' => '+1 (555) 789-0123',
                'destination' => 'Miami, FL 33101',
                'ship_date' => '2024-03-20',
                'estimated_delivery' => '2024-03-25',
                'status' => 'Pending Pickup',
                'package_weight' => '2.1 kg',
                'package_dimensions' => '25x20x10 cm'
            ],
            [
                'id' => 5,
                'shipment_id' => 'SHP-005',
                'order_number' => 'ORD-2024-007',
                'tracking_number' => 'FDX321654987',
                'carrier' => 'FedEx',
                'customer_name' => 'David Miller',
                'customer_phone' => '+1 (555) 654-9876',
                'destination' => 'Phoenix, AZ 85001',
                'ship_date' => '2024-03-19',
                'estimated_delivery' => '2024-03-22',
                'status' => 'Out for Delivery',
                'package_weight' => '7.3 kg',
                'package_dimensions' => '45x35x18 cm'
            ]
        ];

        return view('shipping.index', compact('shipments'));
    }

    public function create()
    {
        // Static order data for dropdown
        $orders = [
            ['id' => 1, 'order_number' => 'ORD-2024-001', 'customer_name' => 'John Smith'],
            ['id' => 2, 'order_number' => 'ORD-2024-002', 'customer_name' => 'Sarah Johnson'],
            ['id' => 3, 'order_number' => 'ORD-2024-003', 'customer_name' => 'Michael Brown'],
            ['id' => 4, 'order_number' => 'ORD-2024-004', 'customer_name' => 'Emily Davis'],
            ['id' => 5, 'order_number' => 'ORD-2024-005', 'customer_name' => 'Robert Wilson']
        ];

        return view('shipping.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'tracking_number' => 'required|string|max:100',
            'carrier' => 'required|in:FedEx,UPS,DHL,USPS,Other',
            'ship_date' => 'required|date',
            'estimated_delivery' => 'required|date|after_or_equal:ship_date',
            'status' => 'required|in:Pending Pickup,In Transit,Out for Delivery,Delivered,Exception',
            'package_weight' => 'required|numeric|min:0',
            'package_dimensions' => 'required|string|max:100',
            'notes' => 'nullable|string'
        ]);

        // Here you would save to database
        // Shipment::create($request->all());

        return redirect()->route('shipping.index')->with('success', 'Shipment created successfully!');
    }

    public function show($id)
    {
        // Static data for now
        $shipment = [
            'id' => $id,
            'order_number' => 'ORD-2024-001',
            'tracking_number' => 'FDX123456789',
            'carrier' => 'FedEx',
            'customer_name' => 'John Smith',
            'customer_email' => 'john.smith@example.com',
            'destination' => 'New York, NY 10001',
            'ship_date' => '2024-03-16',
            'estimated_delivery' => '2024-03-18',
            'actual_delivery' => null,
            'status' => 'In Transit',
            'package_weight' => '5.2 kg',
            'package_dimensions' => '40x30x15 cm',
            'notes' => 'Handle with care - fragile electronics',
            'tracking_history' => [
                ['date' => '2024-03-16 10:00', 'status' => 'Package picked up', 'location' => 'Warehouse'],
                ['date' => '2024-03-16 15:30', 'status' => 'In transit', 'location' => 'Distribution Center'],
                ['date' => '2024-03-17 08:45', 'status' => 'Arrived at facility', 'location' => 'New York Hub'],
                ['date' => '2024-03-17 14:20', 'status' => 'Out for delivery', 'location' => 'Local Facility']
            ]
        ];

        $pageType = 'Shipment Details';
        return view('work-in-progress', compact('pageType'));
    }

    public function edit($id)
    {
        // Static data for now
        $shipment = [
            'id' => $id,
            'order_id' => 1,
            'order_number' => 'ORD-2024-001',
            'tracking_number' => 'FDX123456789',
            'carrier' => 'FedEx',
            'ship_date' => '2024-03-16',
            'estimated_delivery' => '2024-03-18',
            'status' => 'In Transit',
            'package_weight' => 5.2,
            'package_dimensions' => '40x30x15 cm',
            'notes' => 'Handle with care - fragile electronics'
        ];

        $orders = [
            ['id' => 1, 'order_number' => 'ORD-2024-001', 'customer_name' => 'John Smith'],
            ['id' => 2, 'order_number' => 'ORD-2024-002', 'customer_name' => 'Sarah Johnson'],
            ['id' => 3, 'order_number' => 'ORD-2024-003', 'customer_name' => 'Michael Brown'],
            ['id' => 4, 'order_number' => 'ORD-2024-004', 'customer_name' => 'Emily Davis'],
            ['id' => 5, 'order_number' => 'ORD-2024-005', 'customer_name' => 'Robert Wilson']
        ];

        $pageType = 'Shipment Edit';
        return view('work-in-progress', compact('pageType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'tracking_number' => 'required|string|max:100',
            'carrier' => 'required|in:FedEx,UPS,DHL,USPS,Other',
            'ship_date' => 'required|date',
            'estimated_delivery' => 'required|date|after_or_equal:ship_date',
            'status' => 'required|in:Pending Pickup,In Transit,Out for Delivery,Delivered,Exception',
            'package_weight' => 'required|numeric|min:0',
            'package_dimensions' => 'required|string|max:100',
            'notes' => 'nullable|string'
        ]);

        // Here you would update in database
        // Shipment::findOrFail($id)->update($request->all());

        return redirect()->route('shipping.index')->with('success', 'Shipment updated successfully!');
    }

    public function destroy($id)
    {
        // Here you would delete from database
        // Shipment::findOrFail($id)->delete();

        return response()->json(['success' => true, 'message' => 'Shipment deleted successfully!']);
    }
}
