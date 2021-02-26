<?php

namespace App\Models;

use Illuminate\{Database\Eloquent\Factories\HasFactory, Database\Eloquent\Model};

/**
 * @method static create(array $array)
 */
class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'measure',
        'supplier',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
