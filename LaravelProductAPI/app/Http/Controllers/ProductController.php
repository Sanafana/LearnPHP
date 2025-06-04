<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'unit' => 'required|string',
            'stock' => 'required|numeric',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'supplier' => 'required|string',
            'invoice_path' => 'required|string',
        ]);

        $product = Product::firstOrNew(['name' => $data['name']]);

        $product->unit = $data['unit'];
        $product->stock = ($product->exists ? $product->stock : 0) + $data['stock'];
        $product->last_purchase_date = $data['date'];
        $product->last_price = $data['price'];
        $product->last_supplier = $data['supplier'];
        $product->invoice_path = $data['invoice_path'];

        $product->save();

        return response()->json($product, 201);
    }
}
