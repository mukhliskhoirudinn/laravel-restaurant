<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'status'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->user_id = auth()->user()->id;
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
