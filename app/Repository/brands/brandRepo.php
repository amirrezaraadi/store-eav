<?php

namespace App\Repository\brands;

use App\Models\Brand;
use Cviebrock\EloquentSluggable\Services\SlugService;

class brandRepo
{
    public function index()
    {
        return Brand::query()->paginate();
    }

    public function create($data)
    {
        return Brand::query()->create([
            'title' => $data['title'],
            'title_en' => $data['title_en'],
            'slug' => SlugService::createSlug(Brand::class, 'slug', $data['title']),
            'slug_en' => SlugService::createSlug(Brand::class, 'slug', $data['title_en']),
            'address' => $data['address'],
            'site' => $data['site'],
            'phone' => $data['phone'],
            'image' => $data['image'],
            'description' => $data['description'],
            'special' => $data['special'],
//            'user_id' => auth()->user()->id,
            'user_id' => 1
        ]);
    }

    public function getFindId($id)
    {
        return Brand::query()->findOrFail($id);
    }

    public function update($data, $id)
    {
        $brands = $this->getFindId($id);
        return Brand::query()->where('id', $id)->update([
            'title' => $data['title'] ?? $brands->title,
            'title_en' => $data['title_en'] ?? $brands->title_en,
            'slug' => SlugService::createSlug(Brand::class, 'slug',
                $data['title'] ?? $brands->title),
            'slug_en' => SlugService::createSlug(Brand::class, 'slug',
                $data['title_en'] ?? $brands->title_en),
            'address' => $data['address'] ?? $brands->address,
            'site' => $data['site'] ?? $brands->site,
            'phone' => $data['phone'] ?? $brands->phone,
            'image' => $data['image'] ?? $brands->image,
            'description' => $data['description'] ?? $brands->description,
            'special' => $data['special'] ?? $brands->special,
//            'user_id' =>  auth()->user()->id ,
            'user_id' => 1
        ]);
    }

    public function delete($id)
    {
        return Brand::query()->where('id', $id)->delete();
    }

    public function status($id, $status)
    {
        return Brand::query()->where('id', $id)->update([
            'status' => $status
        ]);
    }
}
