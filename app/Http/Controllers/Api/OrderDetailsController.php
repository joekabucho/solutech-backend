<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Order_details;


class OrderDetailsController extends Controller
{
    public function getAllOrderDetails() {
        $order_details = Order_details::get()->toJson(JSON_PRETTY_PRINT);
        return response($order_details, 200);
    }

    public function getOrderDetail($id) {
        if (Order_details::where('id', $id)->exists()) {
            $order_details = Order_details::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($order_details, 200);
        } else {
            return response()->json([
                "message" => "Order details not found"
            ], 404);
        }
    }

    public function createOrderDetails(Request $request): JsonResponse
    {
        $order_details = new Order_details();
        $order_details->order_id = $request->order_id;
        $order_details->product_id = $request->product_id;

        $order_details->save();

        return response()->json([
            "message" => "Order details record created"
        ], 201);
    }

    public function updateOrderDetails(Request $request, $id) {
        if (Order_details::where('id', $id)->exists()) {
            $order_details = Order_details::find($id);

            $order_details->order_id = is_null($request->order_id) ? $order_details->order_id : $order_details->order_id;
            $order_details->product_id = is_null($request->product_id) ? $order_details->product_id : $order_details->product_id;
            $order_details->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Order details not found"
            ], 404);
        }
    }
    public function deleteOrderDetails ($id): JsonResponse
    {
        if(Order_details::where('id', $id)->exists()) {
            $order_details = Order_details::find($id);
            $order_details->delete();

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
