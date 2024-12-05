<?php

 function index()
{
    $products = Product::all();
    return response()->json($products);
}

function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:products',
        'category' => 'required|string',
        'cost_price' => 'required|numeric',
        'sell_price' => 'required|numeric',
        'stock_min' => 'required|integer',
        'expiration_date' => 'required|date',
    ]);

    $product = Product::create($request->all());
    return response()->json($product, 201);
}

 function update(Request $request, Product $product)
{
    $product->update($request->all());
    return response()->json($product);
}

function destroy(Product $product)
{
    $product->delete();
    return response()->json(null, 204);
}
