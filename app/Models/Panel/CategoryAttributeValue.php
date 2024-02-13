<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttributeValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(CategoryAttributes::class, 'category_attribute_id');
    }
    const STATUS_ENABLE = 'enable';
    const STATUS_DISABLE = 'disable';
    const STATUS_SUCCESS = 'success';

    const STATUS_PENDING = 'pending';
    const STATUS_REJECT = 'rejected';
    public static $statuses = [
        self::STATUS_SUCCESS,
        self::STATUS_PENDING,
        self::STATUS_REJECT,
        self::STATUS_ENABLE,
        self::STATUS_DISABLE,
    ];
}
