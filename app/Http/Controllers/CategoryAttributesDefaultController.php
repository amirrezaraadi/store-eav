<?php

namespace App\Http\Controllers;

use App\Models\Panel\CategoryAttributesDefault;
use Illuminate\Http\Request;

class CategoryAttributesDefaultController extends Controller
{
    public function index()
    {
        return $category = CategoryAttributesDefault::query()->paginate();
    }
    public function store(Request $request)
    {
        CategoryAttributesDefault::query()->create([
            'value' => $request->value,
            'category_attribute_id' => $request->category_attribute_id,
        ]);
        return response()->json(['message' => 'success store category ', 'status' => 'success'], 200);
    }
    public function show($categoryAttributesDefault)
    {
        return $categoryAttributesDefault = CategoryAttributesDefault::query()->findOrFail($categoryAttributesDefault);
    }
    public function update(Request $request, CategoryAttributesDefault $categoryAttributesDefault)
    {
        $categoryAttributesDefault->update([
            'value' => $request->value ?? $categoryAttributesDefault->value,
            'category_attribute_id' => $request->category_attribute_id ?? $categoryAttributesDefault->category_attribute_id
        ]);
        return response()->json(['message' => 'success store category ', 'status' => 'success'], 200);
    }
    public function destroy(CategoryAttributesDefault $categoryAttributesDefault)
    {
        $categoryAttributesDefault->delete();
        return response()->json(['message' => 'success store category ', 'status' => 'success'], 200);
    }
}
