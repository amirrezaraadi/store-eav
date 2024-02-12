<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAttributesDefault extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'value',
        'category_attribute_id',
    ];

    public function categoryProducts(): BelongsTo
    {
        return $this->belongsTo(CategoryAttributes::class, 'category_attribute_id');
    }

    protected $table = 'category_attribute_default_values';
}
