<?php

namespace App\Models\User;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = 'provinces';

    protected $fillable = [
        'name',
        'slug',
        'country_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function countries(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
