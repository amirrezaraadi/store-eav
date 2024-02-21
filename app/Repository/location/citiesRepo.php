<?php

namespace App\Repository\location;

use App\Models\User\City;
use Cviebrock\EloquentSluggable\Services\SlugService;

class citiesRepo
{
    public function index()
    {
        return City::query()->paginate();
    }

    public function create($data)
    {
        return City::query()->create([
            'name' => $data['name'],
            'slug' => SlugService::createSlug(City::class, 'slug', $data['name']),
            'province_id' => $data['province_id'],
        ]);
    }

    public function getFindId($id)
    {
        return City::query()->findOrFail($id);
    }

    public function update($data, $id)
    {
        $province = $this->getFindId($id);
        return City::query()->where('id', $id)->update([
            'name' => $data['name'] ?? $province->name,
            'slug' => SlugService::createSlug(City::class, 'slug', $data['name']),
            'province_id' => $data['province_id'] ?? $province->province_id,
        ]);
    }

    public function delete($id)
    {
        return City::query()->where('id', $id)->delete();
    }
}
