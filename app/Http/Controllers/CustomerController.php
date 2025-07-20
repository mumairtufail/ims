<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Static data for now
        $customers = [
            [
                'id' => 1,
                'customer_id' => 'CUST-001',
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'phone' => '+1 (555) 123-4567',
                'company' => 'TechCorp Inc.',
                'address' => '123 Business Ave, NY 10001',
                'location' => 'New York, NY',
                'type' => 'Business',
                'created_at' => '2024-01-15',
                'status' => 'Active',
                'total_orders' => 12
            ],
            [
                'id' => 2,
                'customer_id' => 'CUST-002',
                'name' => 'Sarah Johnson',
                'email' => 'sarah.j@gmail.com',
                'phone' => '+1 (555) 987-6543',
                'company' => 'Individual',
                'address' => '456 Home St, CA 90210',
                'location' => 'Los Angeles, CA',
                'type' => 'Individual',
                'created_at' => '2024-02-10',
                'status' => 'Active',
                'total_orders' => 8
            ],
            [
                'id' => 3,
                'customer_id' => 'CUST-003',
                'name' => 'Michael Brown',
                'email' => 'mbrown@retailstore.com',
                'phone' => '+1 (555) 456-7890',
                'company' => 'Retail Store LLC',
                'address' => '789 Commerce Blvd, TX 75001',
                'location' => 'Dallas, TX',
                'type' => 'Business',
                'created_at' => '2024-03-05',
                'status' => 'Active',
                'total_orders' => 25
            ],
            [
                'id' => 4,
                'customer_id' => 'CUST-004',
                'name' => 'Emily Davis',
                'email' => 'emily.davis@startup.io',
                'phone' => '+1 (555) 321-0987',
                'company' => 'Innovation Startup',
                'address' => '321 Tech Park, WA 98101',
                'location' => 'Seattle, WA',
                'type' => 'Business',
                'created_at' => '2024-03-20',
                'status' => 'Inactive',
                'total_orders' => 3
            ],
            [
                'id' => 5,
                'customer_id' => 'CUST-005',
                'name' => 'Robert Wilson',
                'email' => 'r.wilson@hotmail.com',
                'phone' => '+1 (555) 654-3210',
                'company' => 'Individual',
                'address' => '654 Residential Dr, FL 33101',
                'location' => 'Miami, FL',
                'type' => 'Individual',
                'created_at' => '2024-04-01',
                'status' => 'Active',
                'total_orders' => 5
            ]
        ];

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'type' => 'required|in:Individual,Business',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'status' => 'required|in:Active,Inactive'
        ]);

        // Here you would save to database
        // Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function show($id)
    {
        // Static data for now
        $customer = [
            'id' => $id,
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
            'phone' => '+1 (555) 123-4567',
            'company' => 'TechCorp Inc.',
            'type' => 'Business',
            'address' => '123 Business Ave',
            'city' => 'New York',
            'state' => 'NY',
            'zip_code' => '10001',
            'country' => 'United States',
            'status' => 'Active',
            'created_at' => '2024-01-15',
            'notes' => 'Long-term business customer with excellent payment history.'
        ];

        $pageType = 'Customer Details';
        return view('work-in-progress', compact('pageType'));
    }

    public function edit($id)
    {
        // Static data for now
        $customer = [
            'id' => $id,
            'customer_id' => 'CUST-001',
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
            'phone' => '+1 (555) 123-4567',
            'company' => 'TechCorp Inc.',
            'type' => 'Business',
            'address' => '123 Business Ave',
            'city' => 'New York',
            'state' => 'NY',
            'zip_code' => '10001',
            'country' => 'United States',
            'status' => 'Active',
            'notes' => 'Long-term business customer with excellent payment history.'
        ];

        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'type' => 'required|in:Individual,Business',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'status' => 'required|in:Active,Inactive'
        ]);

        // Here you would update in database
        // Customer::findOrFail($id)->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        // Here you would delete from database
        // Customer::findOrFail($id)->delete();

        return response()->json(['success' => true, 'message' => 'Customer deleted successfully!']);
    }
}
