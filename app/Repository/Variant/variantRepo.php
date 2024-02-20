<?php

namespace App\Repository\Variant;

use App\Models\Panel\Variant;
use Cviebrock\EloquentSluggable\Services\SlugService;

class variantRepo
{
    public function index()
    {
        return Variant::query()->paginate();
    }

    public function create($data)
    {
        return Variant::query()->create([
            'name' => $data['name'],
            'name_en' => $data['name_en'],
            'slug' => SlugService::createSlug(Variant::class, 'slug', $data['name']),
            'slug_en' => SlugService::createSlug(Variant::class, 'slug', $data['name_en']),
            'value' => $data['value'],
            'user_id' => 1
        ]);
    }

    public function getFindId($id)
    {
        return Variant::query()->findOrFail($id);
    }

    public function update($data, $id)
    {
        $variant = $this->getFindId($id);
        return Variant::query()->where('id' , $id)->update([
            'name' => $data['name'] ?? $variant->name ,
            'name_en' => $data['name_en'] ?? $variant->name_en ,
            'slug' => SlugService::createSlug(Variant::class, 'slug', $data['name'] ?? $variant->name),
            'slug_en' => SlugService::createSlug(Variant::class, 'slug', $data['name_en'] ?? $variant->name_en),
            'value' => $data['value'] ?? $variant->value,
            'user_id' => 1
        ]);
    }

    public function delete($id)
    {
        return Variant::query()->where('id' ,  $id)->delete();
    }

    public function status($id , $status)
    {
        return Variant::query()->where('id' , $id)->update([
           'status' => $status
        ]);
    }
}
