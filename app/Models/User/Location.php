<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'addresses';
    protected $fillable = [
        'is_default',
        'postal_code',
        'address',
        'no',
        'unit',
        'recipient_first_name',
        'recipient_last_name',
        'phone',
        'status',
        'city_id',
        'user_id',
    ];

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

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
