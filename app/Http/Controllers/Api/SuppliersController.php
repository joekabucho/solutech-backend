<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    public function getAllSuppliers() {
        $supplier = Suppliers::get()->toJson(JSON_PRETTY_PRINT);
        return response($supplier, 200);
    }

    public function getSupplier($id) {
        if (Suppliers::where('id', $id)->exists()) {
            $supplier = Suppliers::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($supplier, 200);
        } else {
            return response()->json([
                "message" => "Suppliers not found"
            ], 404);
        }
    }

    public function createSuppliers(Request $request): JsonResponse
    {
        $supplier= new Suppliers();
        $supplier->name = $request->name;

        $supplier->save();

        return response()->json([
            "message" => "Suppliers record created"
        ], 201);
    }

    public function updateSuppliers(Request $request, $id) {
        if (Suppliers::where('id', $id)->exists()) {
            $supplier = Suppliers::find($id);

            $supplier->name = is_null($request->name) ? $supplier->name : $supplier->name;
            $supplier->save();

            return response()->json([
                "message" => "Suppliers updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Suppliers details not found"
            ], 404);
        }
    }
    public function deleteSuppliers ($id): JsonResponse
    {
        if(Suppliers::where('id', $id)->exists()) {
            $supplier = Suppliers::find($id);
            $supplier->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Suppliers details not found"
            ], 404);
        }
    }
}

