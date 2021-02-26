<?php

namespace App\Models;

use Illuminate\{Database\Eloquent\Factories\HasFactory, Database\Eloquent\Model, Database\Eloquent\Relations\HasMany};

/**
 * @method static create(string[] $array)
 */
class Box extends Model
{
    use HasFactory;


    protected $fillable = [
        'delivery_date',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function getBoxRecipes(): HasMany
    {
        return $this->hasMany(BoxRecipe::class, 'box_id');
    }
}
