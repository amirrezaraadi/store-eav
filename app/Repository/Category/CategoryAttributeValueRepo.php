<?php

namespace App\Repository\Category;

use App\Models\Panel\CategoryAttributeValue;

class CategoryAttributeValueRepo
{
    private $query;

    public function __construct()
    {
        $this->query = CategoryAttributeValue::query();
    }

    public function index()
    {
        return $this->query->paginate();
    }

    public function create($data)
    {
        return $this->query->create([
            'title' => $data['title'],
            'category_attribute_id' => $data['category_attribute_id'],
        ]);
    }

    public function getFindId($id)
    {
        return $this->query->findOrFail($id);
    }

    public function update($data, $id)
    {
        $category = $this->getFindId($id);
        return $this->query->where('id', $id)->update([
            'title' => $data['title'] ?? $category->title,
            'category_attribute_id' => $data['category_attribute_id'] ?? $category->category_attribute_id,
        ]);
    }

    public function delete($id)
    {
        return $this->query->where('id' , $id)->delete();
    }

}
