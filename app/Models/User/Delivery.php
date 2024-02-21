<?php

namespace App\Models\User;

use App\Models\Panel\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'type',
        'delivery_time',
        'delivery_time_unit',
        'product_id',
        'location_id',
    ];

    const TYPE_NORMAL = 'normal'; // عادی
    const TYPE_INSTANTANEOUS = 'instantaneous'; // فوری
    const TYPE_SPECIAL_SUBSCRIPTION = 'special_subscription'; //اشتارک ویژه
    const TYPE_FREE = 'free';
    public static $types = [
        self::TYPE_NORMAL,
        self::TYPE_INSTANTANEOUS,
        self::TYPE_SPECIAL_SUBSCRIPTION,
        self::TYPE_FREE
    ];

    const TIME_THREE_TO_TWELVE = 'three_to_twelve';
    const TIME_TWELVE_TO_FIFTEEN = 'twelve_to_fifteen';
    const TIME_FIFTEEN_TO_EIGHTEEN = 'fifteen_to_eighteen';
    const TIME_EIGHTEEN_TO_TWENTY_ONE = ' eighteen_to_twenty_one';
    public static $delivery_time = [
        self::TIME_THREE_TO_TWELVE,
        self::TIME_TWELVE_TO_FIFTEEN,
        self::TIME_FIFTEEN_TO_EIGHTEEN,
        self::TIME_EIGHTEEN_TO_TWENTY_ONE
    ];
    const WEEK_MONDAY = 'monday';
    const WEEK_TUESDAY = 'tuesday';
    const WEEK_WEDNESDAY = 'wednesday';
    const WEEK_THURSDAY = 'thursday';
    const WEEK_FRIDAY = 'friday';
    const WEEK_SATURDAY = 'saturday';
    const WEEK_SUNDAY = 'sunday';
    public static $weeky = [
        self::WEEK_MONDAY,
        self::WEEK_TUESDAY,
        self::WEEK_WEDNESDAY,
        self::WEEK_THURSDAY,
        self::WEEK_FRIDAY,
        self::WEEK_SATURDAY,
        self::WEEK_SUNDAY
    ];

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class , 'location_id');
    }
}
