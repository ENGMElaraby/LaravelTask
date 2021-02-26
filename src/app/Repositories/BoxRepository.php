<?php

namespace App\Repositories;

use App\{Classes\Helpers\FilesHelper, Classes\Repositories\Repository, Models\Box, Models\BoxRecipe, Singleton\UserBox};

class BoxRepository extends Repository
{
    use FilesHelper;

    /**
     * BoxRepository constructor.
     * @param Box $model
     */
    public function __construct(Box $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $box = $this->model::create([
            'delivery_date' => $data['delivery_date']
        ]);
        $this->createBoxRecipes($box->id, $data['recipe_ids']);

        return $this->model->with('getBoxRecipes')->find($box->id);
    }

    /**
     * @param int $boxId
     * @param array $recipes
     */
    private function createBoxRecipes(int $boxId, array $recipes): void
    {
        foreach ($recipes as $recipe) {
            BoxRecipe::create([
                'box_id'    => $boxId,
                'recipe_id' => $recipe,
            ]);
        }
    }

}
