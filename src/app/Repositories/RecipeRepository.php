<?php

namespace App\Repositories;

use App\{Classes\Helpers\FilesHelper, Classes\Repositories\Repository, Models\Recipe};

class RecipeRepository extends Repository
{
    use FilesHelper;

    /**
     * RecipeRepository constructor.
     * @param Recipe $model
     */
    public function __construct(Recipe $model)
    {
        parent::__construct($model);
    }
}
