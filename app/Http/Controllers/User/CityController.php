<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\location\citiesRepo;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct(public citiesRepo $citiesRepo)
    {
    }

    public function index()
    {
        return $city = $this->citiesRepo->index();
    }


    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->citiesRepo->create($request->only([
            'name',
            'province_id',

        ]));
        return response()->json(['message' => 'success store city', 'success' => 'success'], 200);
    }

    public function show($city)
    {
        return $city = $this->citiesRepo->getFindId($city);
    }


    public function update(Request $request, $city): \Illuminate\Http\JsonResponse
    {
        $this->citiesRepo->update($request->only(['name', 'province_id']), $city);
        return response()->json(['message' => 'success store city', 'success' => 'success'], 200);
    }


    public function destroy($city): \Illuminate\Http\JsonResponse
    {
        $result = $this->citiesRepo->delete($city);
        if ($result === 0) return response()->json(['message' => 'fail store city', 'success' => 'error'], 404);
        return response()->json(['message' => 'success store city', 'success' => 'success'], 200);
    }
}
