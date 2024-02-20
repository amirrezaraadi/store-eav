<?php

namespace App\Repository\location;

use App\Models\User\Country;
use Cviebrock\EloquentSluggable\Services\SlugService;

class countryRepo
{
    public function index()
    {
        return Country::query()->paginate();
    }

    public function create($data)
    {
        return Country::query()->create([
            'name' => $data['name'],
            'slug' => SlugService::createSlug(Country::class, 'slug', $data['name']),
            'number' => $data['number'],
        ]);
    }
    public function getFindId($id)
    {
        return Country::query()->findOrFail($id);
    }
    public function update($data , $id)
    {
        $country_id = $this->getFindId($id);
        return Country::query()->where('id' , $id)->update([
            'name' => $data['name'] ?? $country_id->name,
            'slug' => SlugService::createSlug(Country::class, 'slug', $data['name'] ?? $country_id->name) ,
            'number' => $data['number'] ?? $country_id->number,
        ]);
    }
    public function delete($id)
    {
        return Country::query()->where('id' , $id)->delete();
    }
}
