<?php

namespace App\Http\Controllers;

use App\Models\Panel\Variant;
use App\Http\Requests\StoreVariantRequest;
use App\Http\Requests\UpdateVariantRequest;
use App\Repository\Variant\variantRepo;
use http\Env\Response;

class VariantController extends Controller
{
    public function __construct(public variantRepo $variantRepo)
    {
    }

    public function index()
    {
        return $variant = $this->variantRepo->index();
    }


    public function store(StoreVariantRequest $request): \Illuminate\Http\JsonResponse
    {

        $this->variantRepo->create($request->only([
            'name',
            'name_en',
            'value'
        ]));
        return response()->json(['message' => 'success variant store', 'status' => 'success'], 200);
    }

    public function show($variant)
    {
        return $variant = $this->variantRepo->getFindId($variant);
    }

    public function update(UpdateVariantRequest $request, $variant): \Illuminate\Http\JsonResponse
    {
        $this->variantRepo->update($request->only([
            'name',
            'name_en',
            'value'
        ]), $variant);
        return response()->json(['message' => 'success variant updated', 'status' => 'success'], 200);
    }

    public function destroy($variant): \Illuminate\Http\JsonResponse
    {
        $variant = $this->variantRepo->delete($variant);
        if ($variant === 0) return response()->json(['message' => 'fail variant deleted', 'status' => 'error'], 404);
        return response()->json(['message' => 'success variant deleted', 'status' => 'success'], 200);
    }

    public function success($id): \Illuminate\Http\JsonResponse
    {
        $status = $this->variantRepo->status($id, Variant::STATUS_SUCCESS);
        if ($status === 0) return response()->json(['message' => 'fail change status', 'status' => 'error'], 404);
        return response()->json(['message' => 'success change status', 'status' => 'success'], 200);
    }


    public function reject($id): \Illuminate\Http\JsonResponse
    {
        $status = $this->variantRepo->status($id, Variant::STATUS_REJECT);
        if ($status === 0) return response()->json(['message' => 'fail change status', 'status' => 'error'], 404);
        return response()->json(['message' => 'success change status', 'status' => 'success'], 200);
    }


    public function pending($id): \Illuminate\Http\JsonResponse
    {
        $status = $this->variantRepo->status($id, Variant::STATUS_PENDING);
        if ($status === 0) return response()->json(['message' => 'fail change status', 'status' => 'error'], 404);
        return response()->json(['message' => 'success change status', 'status' => 'success'], 200);
    }
}
