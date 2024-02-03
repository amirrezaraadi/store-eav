<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'slug_en',
        'address',
        'site',
        'phone',
        'image',
        'description',
        'content_finished',
        'special',
        'status',
//        'category_id',
        'user_id',
        'time_start',
        'time_finished',
    ];

    protected $casts = [
        'time_start' => 'datetime',
        'time_finished' => 'datetime',
    ];

//    public function sluggable(): array
//    {
//        return [
//            'slug' => [
//                'source' => ['title', 'title_en']
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
