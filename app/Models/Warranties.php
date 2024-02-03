<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Warranties extends Model
{
    use HasFactory;

    protected $table = 'warranties';
//    public function sluggable(): array
//    {
//        return [
//            'slug' => [
//                'source' => ['title']
//            ]
//        ];
//    }
    const STATUS_SUCCESS = 'success';
    const STATUS_PENDING = 'pending';
    const STATUS_REJECT = 'reject';
    const STATUS_CLOSE = 'close';
    const STATUS_FINISHED = 'finish';
    public static $statuses = [
        self::STATUS_SUCCESS,
        self::STATUS_PENDING,
        self::STATUS_REJECT,
        self::STATUS_CLOSE,
        self::STATUS_FINISHED,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
