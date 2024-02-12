<?php

namespace App\Repository\Category;

use App\Models\Panel\CategoryProduct;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryProductRepo
{
    public function index()
    {
        return CategoryProduct::query()->paginate();
    }

    public function create($data)
    {
        return CategoryProduct::query()->create([
            'name' => $data['name'],
            'slug' => SlugService::createSlug(CategoryProduct::class, 'slug', $data['name']),
//            'image' => $image,
            'image' => $data['image'],
            'content' => $data['content'],
            'show_in_menu' => $data['show_in_menu'],
            'parent_id' => $data['parent_id'],
        ]);
    }

    public function delete($id)
    {
        return CategoryProduct::query()->where('id', $id)->delete();
    }

    public function update($data, $id)
    {
        $category = $this->getFindId($id);
        return CategoryProduct::query()->where('id', $id)->update([
            'name' => $data['name'] ?? $category->name,
            'slug' => SlugService::createSlug(CategoryProduct::class, 'slug', $data['name'] ?? $category->name),
//            'image' => $image ?? $category->image,
            'image' => $data['image'],
            'content' => $data['content'] ?? $category->content,
            'show_in_menu' => $data['show_in_menu'] ?? $category->show_in_menu,
            'parent_id' => $data['parent_id'] ?? $category->parent_id,
        ]);
    }

    public function getFindId($id)
    {
        return CategoryProduct::query()->findOrFail($id);
    }

    public function getFindName($name)
    {
        return CategoryProduct::query()->where('name', $name)->first();
    }
}
