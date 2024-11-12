<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'type',
        'code',
        'name',
        'email',
        'phone',
        'date',
        'time',
        'people',
        'amount',
        'file',
        'status',
        'message'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->code = Str::random(6);
        });
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
