<?php

namespace App\Http\Controllers;

use App\Models\Panel\CategoryProduct;
use App\Repository\Category\categoryProductRepo;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function __construct(public CategoryProductRepo $category_product)
    {
    }

    public function index()
    {
        return $category_product = $this->category_product->index();
    }


    public function store(Request $request)
    {
        // todo image
        $this->category_product->create($request);
        return response()->json(['message' => 'success store', 'status' => 'success'], 200);
    }


    public function show($categoryProduct)
    {
        return $category = $this->category_product->getFindId($categoryProduct);
    }


    public function update(Request $request, $categoryProduct)
    {
        // todo image
        $this->category_product->update($request, $categoryProduct);
        return response()->json(['message' => 'success update', 'status' => 'success'], 200);
    }


    public function destroy($categoryProduct)
    {
        $this->category_product->delete($categoryProduct);
        return response()->json(['message' => 'success delete', 'status' => 'success'], 200);
    }
}
