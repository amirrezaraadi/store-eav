<?php

namespace App\Models\User;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory , Sluggable , SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'province_id',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function provinces(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

}
