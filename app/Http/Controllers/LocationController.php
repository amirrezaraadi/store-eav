<?php

namespace App\Http\Controllers;

use App\Models\User\Location;
use App\Repository\location\locationRepo;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct(public locationRepo $locationRepo)
    {
    }

    public function index()
    {
        return $location = $this->locationRepo->index();
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->locationRepo->create($request);
        return response()->json(['message' => 'success store location', 'status' => 'success'], 200);
    }

    public function show($location)
    {
        return $location = $this->locationRepo->getFindId($location);
    }


    public function update(Request $request, $location): \Illuminate\Http\JsonResponse
    {
        $this->locationRepo->update($request, $location);
        return response()->json(['message' => 'success store location', 'status' => 'success'], 200);
    }


    public function destroy($location): \Illuminate\Http\JsonResponse
    {
        $deleted = $this->locationRepo->deleted($location);
        if ($deleted === 0) return response()->json(['message' => 'success deleted location', 'status' => 'error'], 404);
        return response()->json(['message' => 'success deleted location', 'status' => 'success'], 200);
    }

    public function success($id)
    {
        $status = $this->locationRepo->status($id, Location::STATUS_SUCCESS);
        if ($status === 0)
            return response()->json(['message' => 'fail change status', 'status' => 'error'], 404);

        return response()->json(['message' => 'success change status', 'status' => 'success'], 200);
    }


    public function reject($id)
    {
        $status = $this->locationRepo->status($id, Location::STATUS_REJECT);
        if ($status === 0)
            return response()->json(['message' => 'fail change status', 'status' => 'error'], 404);

        return response()->json(['message' => 'success change status', 'status' => 'success'], 200);
    }


    public function pending($id)
    {
        $status = $this->locationRepo->status($id, Location::STATUS_PENDING);
        if ($status === 0)
            return response()->json(['message' => 'fail change status', 'status' => 'error'], 404);

        return response()->json(['message' => 'success change status', 'status' => 'success'], 200);
    }
}
