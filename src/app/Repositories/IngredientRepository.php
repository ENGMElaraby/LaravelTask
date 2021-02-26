<?php

namespace App\Repositories;

use App\{Classes\Helpers\FilesHelper,
    Classes\Repositories\Repository,
    Models\Ingredient};

class IngredientRepository extends Repository
{
    use FilesHelper;

    /**
     * IngredientRepository constructor.
     * @param Ingredient $model
     */
    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}
