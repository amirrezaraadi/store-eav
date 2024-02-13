<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repository\products\productRepo;

class ProductController extends Controller
{
    public function __construct(public productRepo $productRepo)
    {
    }

    public function index()
    {
        return $products = $this->productRepo->index();
    }

    public function store(StoreProductRequest $request)
    {
        $image = $request->image ;
        $this->productRepo->create($request->only([
            'name',
            'intro_production',
            'marketable',
            'brand_id',
            'category_id',
            'published_at'
        ]) , $image);
        return response()->json(['message' => 'success store products', 'status' => 'success'], 200);
    }


    public function show(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
