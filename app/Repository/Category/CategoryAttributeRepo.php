<?php

namespace App\Repository\Category;

use App\Models\Panel\CategoryAttributes;
use App\Models\Panel\CategoryProduct;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryAttributeRepo
{
    public function index()
    {
        return CategoryAttributes::query()->paginate();
    }

    public function create($data)
    {
        return CategoryAttributes::query()->create([
            'name' => $data['name'],
            'slug' => SlugService::createSlug(CategoryAttributes::class, 'slug', $data['name']),
            'type' => $data['type'],
            'unit' => $data['unit'],
            'category_id' => $data['category_id'],
        ]);
    }

    public function delete($id)
    {
        return CategoryAttributes::query()->where('id', $id)->delete();
    }

    public function update($data, $id)
    {
        $category = $this->getFindId($id);
        return CategoryAttributes::query()->where('id', $id)->update([
            'name' => $data['name'] ?? $category->name,
            'slug' => SlugService::createSlug(CategoryAttributes::class, 'slug', $data['name'] ?? $category->name),
            'type' => $data['type'] ?? $category->type,
            'unit' => $data['unit'] ?? $category->unit,
            'category_id' => $data['category_id'] ?? $category->category_id,
        ]);
    }

    public function getFindId($id)
    {
        return CategoryAttributes::query()->findOrFail($id);
    }

    public function getFindName($name)
    {
        return CategoryAttributes::query()->where('name', $name)->first();
    }
}
