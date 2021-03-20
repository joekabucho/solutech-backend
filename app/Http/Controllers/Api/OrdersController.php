<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Orders;

class OrdersController extends Controller
{
    public function getAllOrders() {
        $orders = Orders::get()->toJson(JSON_PRETTY_PRINT);
        return response($orders, 200);
    }

    public function getOrder($id) {
        if (Orders::where('id', $id)->exists()) {
            $orders = Orders::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($orders, 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }

    public function createOrders(Request $request): JsonResponse
    {
        $orders= new Orders();
        $orders->order_id = $request->order_id;
        $orders->product_id = $request->product_id;
        $orders->created_at = $request->created_at;
        $orders->updated_at = $request->updated_at;
        $orders->deleted_at = $request->deleted_at;

        $orders->save();

        return response()->json([
            "message" => "Product record created"
        ], 201);
    }

    public function updateOrders(Request $request, $id) {
        if (Orders::where('id', $id)->exists()) {
            $orders = Orders::find($id);

            $orders->order_id = is_null($request->order_id) ? $orders->order_id : $orders->order_id;
            $orders->product_id = is_null($request->product_id) ? $orders->product_id : $orders->product_id;
            $orders->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Order details not found"
            ], 404);
        }
    }
    public function deleteOrders ($id): JsonResponse
    {
        if(Orders::where('id', $id)->exists()) {
            $orders = Orders::find($id);
            $orders->delete();

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

