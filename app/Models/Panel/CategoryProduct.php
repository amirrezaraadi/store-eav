<?php

namespace App\Models\Panel;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = 'product_category';
    protected $fillable = [
        'name',
        'slug',
        'image',
        'content',
        'status',
        'show_in_menu',
        'parent_id',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class, 'parent_id');
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'parent_id');
    }

    const STATUS_SUCCESS = 'success';
    const STATUS_PENDING = 'pending';
    const STATUS_REJECT = 'reject';
    public static $statuses = [
        self::STATUS_SUCCESS,
        self::STATUS_PENDING,
        self::STATUS_REJECT,
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
