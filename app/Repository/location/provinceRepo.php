<?php

namespace App\Repository\location;

use App\Models\User\Province;
use Cviebrock\EloquentSluggable\Services\SlugService;

class provinceRepo
{
    public function index()
    {
        return Province::query()->paginate();
    }

    public function create($data)
    {
        return Province::query()->create([
            'name' => $data['name'],
            'slug' => SlugService::createSlug(Province::class, 'slug', $data['name']),
            'country_id' => $data['country_id'],
        ]);
    }

    public function getFindId($id)
    {
        return Province::query()->findOrFail($id);
    }

    public function update($data, $id)
    {
        $province = $this->getFindId($id);
        return Province::query()->where('id', $id)->update([
            'name' => $data['name'] ?? $province->name,
            'slug' => SlugService::createSlug(Province::class, 'slug', $data['name']),
            'country_id' => $data['country_id'] ?? $province->country_id,
        ]);
    }

    public function delete($id)
    {
        return Province::query()->where('id', $id)->delete();
    }
}
