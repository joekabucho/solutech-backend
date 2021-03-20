<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAllProducts() {
        $products = Product::get()->toJson(JSON_PRETTY_PRINT);
        return response($products, 200);
    }

    public function getProduct($id) {
        if (Product::where('id', $id)->exists()) {
            $products = Product::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($products, 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }

    public function createProduct(Request $request): JsonResponse
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;

        $product->save();

        return response()->json([
            "message" => "Product record created"
        ], 201);
    }

    public function updateProduct(Request $request, $id) {
        if (Product::where('id', $id)->exists()) {
            $product = Product::find($id);

            $product->name = is_null($request->name) ? $product->name : $product->name;
            $product->description = is_null($request->description) ? $product->description : $product->description;
            $product->quantity = is_null($request->quantity) ? $product->quantity : $product->quantity;
            $product->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }
    public function deleteProduct ($id): JsonResponse
    {
        if(Product::where('id', $id)->exists()) {
            $product = Product::find($id);
            $product->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }
}
