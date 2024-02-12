<?php

namespace App\Http\Controllers;

use App\Models\Panel\CategoryAttributes;
use App\Repository\Category\CategoryAttributeRepo;
use Illuminate\Http\Request;

class CategoryAttributesController extends Controller
{
    public function __construct(public CategoryAttributeRepo $categoryAttributeRepo){}
    public function index()
    {
        return $category = $this->categoryAttributeRepo->index();
    }

    public function store(Request $request)
    {
        $this->categoryAttributeRepo->create($request);
        return response()->json(['message' => 'success store ', 'status' => 'success'], 200);
    }

    public function show($categoryAttributes)
    {
        return $category = $this->categoryAttributeRepo->getFindId($categoryAttributes);
    }

    public function update(Request $request, $categoryAttributes)
    {
        $this->categoryAttributeRepo->update( $request , $categoryAttributes);
        return response()->json(['message' => 'success store ', 'status' => 'success'], 200);
    }

    public function destroy($categoryAttributes)
    {
        $this->categoryAttributeRepo->delete($categoryAttributes);
        return response()->json(['message' => 'success store ', 'status' => 'success'], 200);
    }
}
