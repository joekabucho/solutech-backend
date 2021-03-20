<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Order_details;


class OrderDetailsController extends Controller
{
    public function getAllProducts() {
        $books = Order_details::get()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
    }

    public function getProduct($id) {
        if (Order_details::where('id', $id)->exists()) {
            $book = Order_details::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }

    public function createProduct(Request $request): JsonResponse
    {
        $product = new Order_details();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->created_at = $request->created_at;
        $product->updated_at = $request->updated_at;
        $product->deleted_at = $request->deleted_at;

        $product->save();

        return response()->json([
            "message" => "Product record created"
        ], 201);
    }

    public function updateProduct(Request $request, $id) {
        if (Order_details::where('id', $id)->exists()) {
            $product = Order_details::find($id);

            $product->name = is_null($request->name) ? $product->name : $product->name;
            $product->description = is_null($request->description) ? $product->description : $product->description;
            $product->quantity = is_null($request->quantity) ? $product->quantity : $product->quantity;
            $product->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Order details not found"
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
                "message" => "Order details not found"
            ], 404);
        }
    }
}
