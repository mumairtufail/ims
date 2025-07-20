<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Static data for now
        $products = [
            [
                'id' => 1,
                'name' => 'MacBook Pro 16"',
                'sku' => 'PRD-001',
                'category' => 'Electronics',
                'brand' => 'Apple',
                'price' => 2499.00,
                'stock' => 12,
                'status' => 'In Stock'
            ],
            [
                'id' => 2,
                'name' => 'Gaming Chair RGB',
                'sku' => 'PRD-002',
                'category' => 'Furniture',
                'brand' => 'RazerX',
                'price' => 399.00,
                'stock' => 8,
                'status' => 'Low Stock'
            ],
            [
                'id' => 3,
                'name' => 'Wireless Headphones',
                'sku' => 'PRD-003',
                'category' => 'Accessories',
                'brand' => 'Sony',
                'price' => 299.00,
                'stock' => 25,
                'status' => 'In Stock'
            ],
            [
                'id' => 4,
                'name' => 'Smartphone Galaxy S24',
                'sku' => 'PRD-004',
                'category' => 'Mobile Phones',
                'brand' => 'Samsung',
                'price' => 899.00,
                'stock' => 18,
                'status' => 'In Stock'
            ],
            [
                'id' => 5,
                'name' => 'Gaming Keyboard',
                'sku' => 'PRD-005',
                'category' => 'Gaming',
                'brand' => 'Corsair',
                'price' => 149.00,
                'stock' => 3,
                'status' => 'Out of Stock'
            ]
        ];

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100',
            'category' => 'required|string',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'status' => 'required|string'
        ]);

        // Here you would save to database
        // Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        // Static data for now
        $product = [
            'id' => $id,
            'name' => 'MacBook Pro 16"',
            'sku' => 'PRD-001',
            'category' => 'Electronics',
            'brand' => 'Apple',
            'price' => 2499.00,
            'cost_price' => 2000.00,
            'stock' => 12,
            'weight' => 2.1,
            'dimensions' => '35.57 x 24.59 x 1.68 cm',
            'status' => 'Active',
            'description' => 'High-performance laptop for professionals'
        ];

        $pageType = 'Product Details';
        return view('work-in-progress', compact('pageType'));
    }

    public function edit($id)
    {
        // Static data for now
        $product = [
            'id' => $id,
            'name' => 'MacBook Pro 16"',
            'sku' => 'PRD-001',
            'category' => 'Electronics',
            'brand' => 'Apple',
            'price' => 2499.00,
            'cost_price' => 2000.00,
            'stock' => 12,
            'weight' => 2.1,
            'dimensions' => '35.57 x 24.59 x 1.68 cm',
            'status' => 'Active',
            'description' => 'High-performance laptop for professionals'
        ];

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100',
            'category' => 'required|string',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'status' => 'required|string'
        ]);

        // Here you would update in database
        // Product::findOrFail($id)->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        // Here you would delete from database
        // Product::findOrFail($id)->delete();

        return response()->json(['success' => true, 'message' => 'Product deleted successfully!']);
    }
}
