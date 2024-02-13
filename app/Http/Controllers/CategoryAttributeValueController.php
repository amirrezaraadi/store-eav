<?php

namespace App\Http\Controllers;

use App\Models\Panel\CategoryAttributeValue;
use App\Repository\Category\CategoryAttributeValueRepo;
use Illuminate\Http\Request;

class CategoryAttributeValueController extends Controller
{
    public function __construct(public CategoryAttributeValueRepo $repo){}

    public function index()
    {
        return $category = $this->repo->index();
    }


    public function store(Request $request)
    {
        $this->repo->create($request);
        return response()->json(['message' => 'success store' , 'status' => 'success'],200);
    }


    public function show( $categoryAttributeValue)
    {
        return $category = $this->repo->getFindId($categoryAttributeValue);
    }


    public function update(Request $request,  $categoryAttributeValue)
    {
        $this->repo->update($request , $categoryAttributeValue);
        return response()->json(['message' => 'success update' , 'status' => 'success'],200);

    }


    public function destroy(CategoryAttributeValue $categoryAttributeValue)
    {
        $this->repo->delete($categoryAttributeValue);
        return response()->json(['message' => 'success update' , 'status' => 'success'],200);
    }
}
