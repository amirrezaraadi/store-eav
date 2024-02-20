<?php

namespace App\Http\Controllers;

use App\Models\Seller\Seller;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use App\Repository\Seller\Info\infoSellerRepo;

class SellerController extends Controller
{
    public function __construct(public infoSellerRepo $infoSellerRepo)
    {
    }
    public function index()
    {
        return $seller = $this->infoSellerRepo->index();
    }
    public function store(StoreSellerRequest $request)
    {
        $this->infoSellerRepo->create($request->only([
            'first_name',
            'last_name',
            'point',
            'email',
            'phone',
            'cart_number',
        ]));
        return response()->json(['message' => 'success store seller ', 'status' => 'success'], 200);
    }


    public function show($seller)
    {
        return $this->infoSellerRepo->getFindId($seller);
    }


    public function update(UpdateSellerRequest $request, $seller)
    {
        $this->infoSellerRepo->update($request->only([
            'first_name',
            'last_name',
            'point',
            'email',
            'phone',
            'cart_number',
        ]), $seller);
        return response()->json(['message' => 'success update seller ', 'status' => 'success'], 200);
    }

    public function destroy($seller)
    {
        $dated = $this->infoSellerRepo->delete($seller);
        if($dated === 0) return response()->json(['message' => 'fail deleted seller ', 'status' => 'error'], 404);
        return response()->json(['message' => 'success deleted seller ', 'status' => 'success'], 200);
    }

    public function success($brand)
    {
        $this->infoSellerRepo->status($brand, Seller::STATUS_SUCCESS);
        return response()->json(['message' => 'success brande status success', 'status' => 'success'], 200);
    }

    public function reject($brand)
    {
        $this->infoSellerRepo->status($brand, Seller::STATUS_REJECT);
        return response()->json(['message' => 'success brande status reject', 'status' => 'success'], 200);
    }

    public function pending($brand)
    {
        $this->infoSellerRepo->status($brand, Seller::STATUS_PENDING);
        return response()->json(['message' => 'success brande status pending', 'status' => 'success'], 200);
    }
}
