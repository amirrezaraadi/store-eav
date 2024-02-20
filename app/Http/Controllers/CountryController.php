<?php

namespace App\Http\Controllers;

use App\Models\User\Country;
use App\Repository\location\countryRepo;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct(public countryRepo $countryRepo)
    {
    }

    public function index()
    {
        return $country = $this->countryRepo->index();
    }


    public function store(Request $request)
    {
        $this->countryRepo->create($request->only(
            'name',
            'number',
        ));
        return response()->json(['message' => 'success store country', 'status' => 'success'], 200);
    }


    public function show($country)
    {
        return $country = $this->countryRepo->getFindId($country);
    }


    public function update(Request $request, $country)
    {
        $update = $this->countryRepo->update($request->only([
                'name',
                'number',]
        ), $country);
        dd($update);
        if($update === 0)  return response()->json(['message' => 'fail update country' , 'status' => 'error'] , 404);
        return response()->json(['message' => 'success update country', 'status' => 'success'], 200);
    }


    public function destroy($country)
    {
        $deleted = $this->countryRepo->delete($country);
        if($deleted === 0)  return response()->json(['message' => 'fail deleted country' , 'status' => 'error'] , 404);
        return response()->json(['message' => 'success deleted country', 'status' => 'success'], 200);
    }
}
