<?php

namespace App\Repository\products;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Cache;

class productRepo
{
    private $query;

    public function __construct()
    {
        $this->query = Product::query();
    }

    public function index()
    {

       return $this->query->get();

    }

    public function create($data , $image )
    {
        return $this->query->create([
            'name' => $data['name'],
            'slug' => SlugService::createSlug(Product::class, 'slug', $data['name']),
            'intro_production' => $data['intro_production'],
            'image' => $image ,
            'marketable' => $data['marketable'],
            'brand_id' => $data['brand_id'],
            'category_id' => $data['category_id'],
            'published_at' => $data['published_at']
        ]);
    }
}
