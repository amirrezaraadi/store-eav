<?php

namespace App\Repository\Seller\Info;

use App\Models\Seller\Seller;

class infoSellerRepo
{
    private $query;

    public function __construct()
    {
        $this->query = Seller::query();
    }

    public function index()
    {
        return $this->query->paginate();
    }

    public function create($data)
    {
        return $this->query->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'point' => $data['point'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'cart_number' => $data['cart_number'],
        ]);
    }

    public function getFindId($id)
    {
        return $this->query->findOrFail($id);
    }

    public function update($data, $id)
    {
        $seller_id = $this->getFindId($id);
        return $this->query->where('id', $id)->update([
            'first_name' => $data['first_name'] ?? $seller_id->first_name,
            'last_name' => $data['last_name'] ?? $seller_id->last_name,
            'point' => $data['point'] ?? $seller_id->point,
            'email' => $data['email'] ?? $seller_id->email,
            'phone' => $data['phone'] ?? $seller_id->phone,
            'cart_number' => $data['cart_number'] ?? $seller_id->cart_number,
        ]);
    }

    public function delete($id)
    {
        return $this->query->where('id', $id)->delete();
    }

    public function status($id, $status)
    {
        return $this->query->where('id', $id)->update([
            'status' => $status
        ]);
    }
}
