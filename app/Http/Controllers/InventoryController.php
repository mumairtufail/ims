<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        // Static data for now
        $inventoryItems = [
            [
                'id' => 1,
                'name' => 'Laptop Dell XPS 13',
                'sku' => 'DELL-XPS-001',
                'category' => 'Electronics',
                'quantity' => 25,
                'unit_price' => 1200.00,
                'total_value' => 30000.00,
                'status' => 'In Stock'
            ],
            [
                'id' => 2,
                'name' => 'iPhone 15 Pro',
                'sku' => 'APPLE-IP15-001',
                'category' => 'Mobile Phones',
                'quantity' => 15,
                'unit_price' => 999.00,
                'total_value' => 14985.00,
                'status' => 'In Stock'
            ],
            [
                'id' => 3,
                'name' => 'Samsung Monitor 27"',
                'sku' => 'SAM-MON-27',
                'category' => 'Monitors',
                'quantity' => 8,
                'unit_price' => 350.00,
                'total_value' => 2800.00,
                'status' => 'Low Stock'
            ],
            [
                'id' => 4,
                'name' => 'Wireless Mouse',
                'sku' => 'LOG-MS-001',
                'category' => 'Accessories',
                'quantity' => 50,
                'unit_price' => 25.00,
                'total_value' => 1250.00,
                'status' => 'In Stock'
            ],
            [
                'id' => 5,
                'name' => 'Office Chair',
                'sku' => 'FUR-CHR-001',
                'category' => 'Furniture',
                'quantity' => 2,
                'unit_price' => 450.00,
                'total_value' => 900.00,
                'status' => 'Critical'
            ]
        ];

        return view('inventory.index', [
            'title' => 'Inventory Management',
            'inventoryItems' => $inventoryItems
        ]);
    }

    public function create()
    {
        return view('inventory.create', [
            'title' => 'Add New Item'
        ]);
    }

    public function edit($id)
    {
        return view('inventory.edit', [
            'title' => 'Edit Item',
            'id' => $id
        ]);
    }

    public function store(Request $request)
    {
        // Handle store logic here
        return redirect()->route('inventory.index')->with('success', 'Item added successfully!');
    }

    public function update(Request $request, $id)
    {
        // Handle update logic here
        return redirect()->route('inventory.index')->with('success', 'Item updated successfully!');
    }

    public function destroy($id)
    {
        // Handle delete logic here
        return response()->json(['success' => true, 'message' => 'Item deleted successfully!']);
    }
}
