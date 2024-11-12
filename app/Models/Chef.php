<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chef extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'position',
        'description',
        'photo',
        'insta_link',
        'linked_link'
    ];
}
