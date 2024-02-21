<?php

namespace App\Repository\location;

use App\Models\User\Location;

class locationRepo
{
    public function index()
    {
        return Location::query()->paginate();
    }

    public function create($data)
    {
        if ($data['is_default'] == 1) {
            return Location::query()->create([
                'postal_code' => $data['postal_code'],
                'address' => $data['address'],
                'no' => $data['no'],
                'unit' => $data['unit'],
                'recipient_first_name' => auth()->user()->first_name,
                'recipient_last_name' =>  auth()->user()->last_name,
                'phone' => auth()->user()->phone,
                'city_id' => $data['city_id'],
                'is_default' => $data['is_default'] ,
                'user_id' => 1
            ]);
        }
        return Location::query()->create([
            'is_default' => $data['is_default'] ,
            'postal_code' => $data['postal_code'],
            'address' => $data['address'],
            'no' => $data['no'],
            'unit' => $data['unit'],
            'recipient_first_name' => $data['recipient_first_name'],
            'recipient_last_name' => $data['recipient_last_name'],
            'phone' => $data['phone'],
            'city_id' => $data['city_id'],
            'user_id' => 1
        ]);
    }

    public function getFindId($id)
    {
        return Location::query()->findOrFail($id);
    }

    public function update($data, $id)
    {
        $location = $this->getFindId($id);
        if ($data['is_default'] == 1) {
            return Location::query()->where('id' , $id)->update([
                'postal_code' => $data['postal_code'] ?? $location->postal_code,
                'address' => $data['address'] ?? $location->address,
                'no' => $data['no'] ?? $location->no,
                'unit' => $data['unit'] ?? $location->unit,
                'recipient_first_name' => auth()->user()->first_name ,
                'recipient_last_name' =>  auth()->user()->last_name ,
                'phone' => auth()->user()->phone ,
                'city_id' => $data['city_id'] ?? $location->city_id,
                'is_default' => $data['is_default'] ,
                'user_id' => 1
            ]);
        }
        return Location::query()->where('id' , $id)->update([
            'is_default' => $data['is_default'] ,
            'postal_code' => $data['postal_code'] ?? $location->postal_code,
            'address' => $data['address'] ?? $location->address,
            'no' => $data['no'] ?? $location->no,
            'unit' => $data['unit'] ?? $location->unit,
            'recipient_first_name' => $data['recipient_first_name'] ?? $location->recipient_first_name,
            'recipient_last_name' => $data['recipient_last_name'] ?? $location->recipient_last_name,
            'phone' => $data['phone'] ?? $location->phone,
            'city_id' => $data['city_id'],
            'user_id' => 1
        ]);
    }

    public function deleted($id)
    {
        return Location::query()->where('id' , $id)->delete();
    }

    public function status($id, $status)
    {
        return Location::query()->where('id' ,$id)->update([
            'status' => $status
        ]);
    }

    public function default()
    {
        return Location::query()->where('user_id', auth()->id())->first();
    }
}
