<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Province;
use App\Repository\location\provinceRepo;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function __construct(public provinceRepo $provinceRepo){}

    public function index()
    {
        return $province =  $this->provinceRepo->index();
    }


    public function store(Request $request)
    {
        $this->provinceRepo->create($request->only([
            'name',
            'country_id',
        ]));
        return response()->json(['message' => 'success stored province' , 'status' => 'success'] ,200);
    }


    public function show($province)
    {
        return $this->provinceRepo->getFindId($province);
    }


    public function update(Request $request, $province)
    {
        $this->provinceRepo->update($request->only([
            'name',
            'country_id',
        ]) ,$province);
        return response()->json(['message' => 'success updated province' , 'status' => 'success'] ,200);
    }


    public function destroy($province)
    {
        $deleted = $this->provinceRepo->delete($province);
        if($deleted === 0) return response()->json(['message' => 'fail deleted province' , 'status' => 'error'] ,404);
        return response()->json(['message' => 'success deleted province' , 'status' => 'success'] ,200);
    }
}
