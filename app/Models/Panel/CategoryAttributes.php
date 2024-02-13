<?php

namespace App\Models\Panel;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryAttributes extends Model
{
    use HasFactory , Sluggable ;
    protected $fillable = [
        'name',
        'type',
        'slug',
        'unit',
        'category_id',
    ];

    protected $table = 'category_attribute_values';
    const TYPE_TEXT = 'text';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_RADIO = 'radio';
    const TYPE_SELECT = 'select';
    const TYPE_CHECKBOX = 'checkbox';

    public static $types = [
        self::TYPE_TEXT,
        self::TYPE_TEXTAREA,
        self::TYPE_RADIO,
        self::TYPE_SELECT,
        self::TYPE_CHECKBOX,
    ];

    public function categoryProducts(): BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
