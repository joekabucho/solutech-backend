<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\supplier_products;


class SupplierProductsController extends Controller
{
    public function getAllSupplierProducts() {
        $supplier_products = supplier_products::get()->toJson(JSON_PRETTY_PRINT);
        return response($supplier_products, 200);
    }

    public function getSupplierProducts($id) {
        if (supplier_products::where('id', $id)->exists()) {
            $supplier_products = supplier_products::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($supplier_products, 200);
        } else {
            return response()->json([
                "message" => "Suppliers Products not found"
            ], 404);
        }
    }

    public function createSupplierProducts(Request $request): JsonResponse
    {
        $supplier_products= new supplier_products();
        $supplier_products->supply_id = $request->supply_id;
        $supplier_products->product_id = $request->product_id;

        $supplier_products->save();

        return response()->json([
            "message" => "Suppliers Products record created"
        ], 201);
    }

    public function updateSupplierProducts(Request $request, $id) {
        if (supplier_products::where('id', $id)->exists()) {
            $supplier_products = supplier_products::find($id);

            $supplier_products->supply_id = is_null($request->supply_id) ? $supplier_products->supply_id : $supplier_products->supply_id;
            $supplier_products->product_id = is_null($request->product_id) ? $supplier_products->product_id : $supplier_products->product_id;
            $supplier_products->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Suppliers Products details not found"
            ], 404);
        }
    }
    public function deleteSupplierProducts ($id): JsonResponse
    {
        if(supplier_products::where('id', $id)->exists()) {
            $supplier_products = supplier_products::find($id);
            $supplier_products->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Suppliers Orders details not found"
            ], 404);
        }
    }
}

