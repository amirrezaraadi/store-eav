<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const STATUS_SUCCESS = 'success';
    const STATUS_PENDING = 'pending';
    const STATUS_REJECT = 'reject';
    public static $statuses = [
        self::STATUS_SUCCESS,
        self::STATUS_PENDING,
        self::STATUS_REJECT,
    ];

    const MARKET_SUCCESS = 'success';
    const MARKET_PENDING = 'pending';
    const MARKET_REJECT = 'reject';
    public static $market = [
        self::MARKET_SUCCESS,
        self::MARKET_PENDING,
        self::MARKET_REJECT,
    ];

}
