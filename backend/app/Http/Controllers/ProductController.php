<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:products',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'supplier' => 'required|string',
            'cost_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'minimum_stock' => 'required|integer',
            'expiry_date' => 'nullable|date',
        ]);

        return Product::create($validated);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'string|max:255',
            'code' => "string|unique:products,code,{$id}",
            'description' => 'nullable|string',
            'category' => 'string',
            'supplier' => 'string',
            'cost_price' => 'numeric',
            'sale_price' => 'numeric',
            'minimum_stock' => 'integer',
            'expiry_date' => 'nullable|date',
        ]);

        $product->update($validated);

        return $product;
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->noContent();
    }
}
