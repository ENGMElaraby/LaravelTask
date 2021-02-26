<?php
namespace App\Http\Controllers\API;

use App\{Classes\RestfulAPI\ResourceController,
    Http\Requests\IngredientStore,
    Http\Resources\IngredientResource,
    Repositories\IngredientRepository};

class IngredientController extends ResourceController
{
    protected
        $pagination     = true,
        $perPage        = 6,
        $theResource    = IngredientResource::class,
        $storeRequest   = IngredientStore::class;

    /**
     * IngredientController constructor.
     * @param IngredientRepository $repository
     */
    public function __construct(IngredientRepository $repository)
    {
        parent::__construct($repository);
    }

}
