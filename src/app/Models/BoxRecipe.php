<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxRecipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'box_id',
        'recipe_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
