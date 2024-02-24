<?php

namespace App\Http\Controllers;

use App\Models\User\Delivery;
use App\Repository\delivery\deliveryRepo;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct(public deliveryRepo $deliveryRepo){}

    public function index()
    {
        return $delivery = $this->deliveryRepo->index();
    }


    public function store(Request $request)
    {
        $this->deliveryRepo->create($request);
        return response()->json(['message' => 'success' , 'status' => 'success'],200);
    }


    public function show( $delivery)
    {
        return $delivery = $this->deliveryRepo->getFindId($delivery);
    }


    public function update(Request $request,  $delivery)
    {
        $this->deliveryRepo->update($request , $delivery);
        return response()->json(['message' => 'success updated delivery' , 'status' => 'success'],200);

    }


    public function destroy( $delivery)
    {
        $deleted = $this->deliveryRepo->deleted($delivery);
        if($deleted === 0) return response()->json(['message' => 'fail deleted delivery' , 'status' => 'error'],404);
        return response()->json(['message' => 'success deleted delivery' , 'status' => 'success'],200);

    }
}
