<?php
namespace App\Http\Controllers\API;

use App\{Classes\RestfulAPI\ResourceController,
    Http\Requests\RecipeStore,
    Http\Resources\RecipeResource,
    Repositories\RecipeRepository};

class RecipeController extends ResourceController
{
    protected
        $pagination     = true,
        $perPage        = 6,
        $theResource    = RecipeResource::class,
        $storeRequest   = RecipeStore::class;

    /**
     * RecipeController constructor.
     * @param RecipeRepository $repository
     */
    public function __construct(RecipeRepository $repository)
    {
        parent::__construct($repository);
    }

}
