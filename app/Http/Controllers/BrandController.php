<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Repository\brands\brandRepo;

class BrandController extends Controller
{
    public function __construct(public brandRepo $brandRepo)
    {
    }

    public function index()
    {
        return $brands = $this->brandRepo->index();
    }


    public function store(StoreBrandRequest $request)
    {
        $this->brandRepo->create($request);
        return response()->json(['message' => 'success brande store', 'status' => 'success'], 200);
    }

    public function show($brand)
    {
        return $brand = $this->brandRepo->getFindId($brand);
    }

    public function update(UpdateBrandRequest $request, $brand)
    {
        $this->brandRepo->update($request, $brand);
        return response()->json(['message' => 'success brande updated', 'status' => 'success'], 200);
    }

    public function destroy($brand)
    {
        $this->brandRepo->delete($brand);
        return response()->json(['message' => 'success brande deleted', 'status' => 'success'], 200);
    }

    public function success($brand)
    {
        $this->brandRepo->status($brand, Brand::STATUS_SUCCESS);
        return response()->json(['message' => 'success brande status success', 'status' => 'success'], 200);
    }

    public function reject($brand)
    {
        $this->brandRepo->status($brand, Brand::STATUS_REJECT);
        return response()->json(['message' => 'success brande status reject', 'status' => 'success'], 200);
    }

    public function pending($brand)
    {
        $this->brandRepo->status($brand, Brand::STATUS_PENDING);
        return response()->json(['message' => 'success brande status pending', 'status' => 'success'], 200);
    }

    public function close($brand)
    {
        $this->brandRepo->status($brand, Brand::STATUS_CLOSE);
        return response()->json(['message' => 'success brande status close', 'status' => 'success'], 200);
    }


    public function finish($brand)
    {
        $this->brandRepo->status($brand, Brand::STATUS_FINISHED);
        return response()->json(['message' => 'success brande status finish', 'status' => 'success'], 200);
    }

}
