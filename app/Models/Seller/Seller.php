<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'code_phone',
        'ip',
        'point',
        'email',
        'phone',
        'cart_number',
        'status',
        'phone_verified_at',
        'email_verified_at',
    ];
    const STATUS_SUCCESS = 'success';
    const STATUS_PENDING = 'pending';
    const STATUS_REJECT = 'reject';
    public static $statuses = [
        self::STATUS_SUCCESS,
        self::STATUS_PENDING,
        self::STATUS_REJECT,
    ];

    protected $casts = [
        'phone_verified_at'=> 'timestamp',
        'email_verified_at'=> 'timestamp',
    ];
}
