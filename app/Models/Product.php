<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , Sluggable , SoftDeletes;
    protected $guarded =[];
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
    protected $casts = [
        'published_at' => 'timestamp'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
