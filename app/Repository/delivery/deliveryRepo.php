<?php

namespace App\Repository\delivery;

use App\Models\User\Delivery;

class deliveryRepo
{
    public function index()
    {
        return Delivery::query()->paginate();
    }

    public function create($data)
    {
        return Delivery::query()->create([
            'name' => $data['name'],
            'amount' => $data['amount'],
            'type' => $data['type'],
            'delivery_time' => $data['delivery_time'],
            'delivery_time_unit' => $data['delivery_time_unit'],
            'product_id' => $data['product_id'],
            'location_id' => $data['location_id'],
            'status' => Delivery::STATUS_PENDING,
            'success_click' => $data['success_click'],
            'success_receive' => $data['success_receive'],
        ]);
    }

    public function getFindId($id)
    {
        return Delivery::query()->findOrFail($id);
    }

    public function update($data  ,$id)
    {
        $delivery = $this->getFindId($id);
        return Delivery::query()->where('id' ,$id)->update([
            'name' => $data['name'] ?? $delivery->name,
            'amount' => $data['amount'] ?? $delivery->amount,
            'type' => $data['type'] ?? $delivery->type,
            'delivery_time' => $data['delivery_time'] ?? $delivery->delivery_time,
            'delivery_time_unit' => $data['delivery_time_unit'] ?? $delivery->delivery_time_unit,
            'product_id' => $data['product_id'] ?? $delivery->product_id,
            'location_id' => $data['location_id'] ?? $delivery->location_id,
            'status' => Delivery::STATUS_PENDING ?? $delivery->status,
            'success_click' => $data['success_click'] ?? $delivery->success_click,
            'success_receive' => $data['success_receive'] ?? $delivery->success_receive,
        ]);
    }

    public function deleted($id)
    {
        return Delivery::query()->where('id' ,$id)->delete();
    }

    public function status($id , $status)
    {

    }
}
