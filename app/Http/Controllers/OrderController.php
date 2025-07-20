<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Static data for now
        $orders = [
            [
                'id' => 1,
                'order_number' => 'ORD-2024-001',
                'customer_name' => 'John Smith',
                'customer_email' => 'john.smith@example.com',
                'customer_company' => 'TechCorp Inc.',
                'total_amount' => 2998.00,
                'payment_status' => 'Paid',
                'order_status' => 'Processing',
                'status' => 'Processing',  // For view compatibility
                'order_date' => '2024-03-15',
                'order_time' => '14:30',
                'total_items' => 3,
                'items_count' => 3
            ],
            [
                'id' => 2,
                'order_number' => 'ORD-2024-002',
                'customer_name' => 'Sarah Johnson',
                'customer_email' => 'sarah.j@gmail.com',
                'customer_company' => 'Individual',
                'total_amount' => 699.00,
                'payment_status' => 'Pending',
                'order_status' => 'Pending',
                'status' => 'Pending',  // For view compatibility
                'order_date' => '2024-03-16',
                'order_time' => '10:00',
                'total_items' => 2,
                'items_count' => 2
            ],
            [
                'id' => 3,
                'order_number' => 'ORD-2024-003',
                'customer_name' => 'Michael Brown',
                'customer_email' => 'michael.brown@example.com',
                'customer_company' => 'Retail Store LLC',
                'total_amount' => 1547.00,
                'payment_status' => 'Paid',
                'order_status' => 'Shipped',
                'status' => 'Shipped',  // For view compatibility
                'order_date' => '2024-03-10',
                'order_time' => '09:15',
                'total_items' => 5,
                'items_count' => 5
            ],
            [
                'id' => 4,
                'order_number' => 'ORD-2024-004',
                'customer_name' => 'Emily Davis',
                'customer_email' => 'emily.davis@example.com',
                'customer_company' => 'Innovation Startup',
                'total_amount' => 4297.00,
                'payment_status' => 'Paid',
                'order_status' => 'Delivered',
                'status' => 'Delivered',  // For view compatibility
                'order_date' => '2024-03-05',
                'order_time' => '16:45',
                'total_items' => 8,
                'items_count' => 8
            ],
            [
                'id' => 5,
                'order_number' => 'ORD-2024-005',
                'customer_name' => 'Robert Wilson',
                'customer_email' => 'robert.wilson@example.com',
                'customer_company' => 'Individual',
                'total_amount' => 448.00,
                'payment_status' => 'Failed',
                'order_status' => 'Cancelled',
                'status' => 'Cancelled',  // For view compatibility
                'order_date' => '2024-03-18',
                'order_time' => '11:30',
                'total_items' => 1,
                'items_count' => 1
            ]
        ];

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Static customer data for dropdown
        $customers = [
            ['id' => 1, 'name' => 'John Smith', 'company' => 'TechCorp Inc.'],
            ['id' => 2, 'name' => 'Sarah Johnson', 'company' => 'Individual'],
            ['id' => 3, 'name' => 'Michael Brown', 'company' => 'Retail Store LLC'],
            ['id' => 4, 'name' => 'Emily Davis', 'company' => 'Innovation Startup'],
            ['id' => 5, 'name' => 'Robert Wilson', 'company' => 'Individual']
        ];

        return view('orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'order_date' => 'required|date',
            'payment_method' => 'required|string',
            'payment_status' => 'required|in:Pending,Paid,Failed,Refunded',
            'order_status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
            'notes' => 'nullable|string',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string|max:100',
            'shipping_state' => 'required|string|max:100',
            'shipping_zip' => 'required|string|max:20',
            'shipping_country' => 'required|string|max:100'
        ]);

        // Here you would save to database
        // Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show($id)
    {
        // Static data for now
        $order = [
            'id' => $id,
            'order_number' => 'ORD-2024-001',
            'customer_name' => 'John Smith',
            'customer_company' => 'TechCorp Inc.',
            'customer_email' => 'john.smith@example.com',
            'total_amount' => 2998.00,
            'payment_status' => 'Paid',
            'order_status' => 'Processing',
            'order_date' => '2024-03-15',
            'payment_method' => 'Credit Card',
            'shipping_address' => '123 Business Ave, NY 10001',
            'notes' => 'Priority order for quarterly setup',
            'items' => [
                ['name' => 'MacBook Pro 16"', 'quantity' => 1, 'price' => 2499.00],
                ['name' => 'Gaming Chair RGB', 'quantity' => 1, 'price' => 399.00],
                ['name' => 'Gaming Keyboard', 'quantity' => 1, 'price' => 149.00]
            ]
        ];

        $pageType = 'Order Details';
        return view('work-in-progress', compact('pageType'));
    }

    public function edit($id)
    {
        // Static data for now
        $order = [
            'id' => $id,
            'order_number' => 'ORD-2024-001',
            'customer_id' => 1,
            'customer_name' => 'John Smith',
            'order_date' => '2024-03-15',
            'payment_method' => 'Credit Card',
            'payment_status' => 'Paid',
            'order_status' => 'Processing',
            'shipping_address' => '123 Business Ave',
            'shipping_city' => 'New York',
            'shipping_state' => 'NY',
            'shipping_zip' => '10001',
            'shipping_country' => 'United States',
            'notes' => 'Priority order for quarterly setup'
        ];

        $customers = [
            ['id' => 1, 'name' => 'John Smith', 'company' => 'TechCorp Inc.'],
            ['id' => 2, 'name' => 'Sarah Johnson', 'company' => 'Individual'],
            ['id' => 3, 'name' => 'Michael Brown', 'company' => 'Retail Store LLC'],
            ['id' => 4, 'name' => 'Emily Davis', 'company' => 'Innovation Startup'],
            ['id' => 5, 'name' => 'Robert Wilson', 'company' => 'Individual']
        ];

        $pageType = 'Order Edit';
        return view('work-in-progress', compact('pageType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'order_date' => 'required|date',
            'payment_method' => 'required|string',
            'payment_status' => 'required|in:Pending,Paid,Failed,Refunded',
            'order_status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
            'notes' => 'nullable|string',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string|max:100',
            'shipping_state' => 'required|string|max:100',
            'shipping_zip' => 'required|string|max:20',
            'shipping_country' => 'required|string|max:100'
        ]);

        // Here you would update in database
        // Order::findOrFail($id)->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy($id)
    {
        // Here you would delete from database
        // Order::findOrFail($id)->delete();

        return response()->json(['success' => true, 'message' => 'Order deleted successfully!']);
    }
}
