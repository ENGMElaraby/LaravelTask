<?php
namespace App\Http\Controllers\Web;

use App\{Classes\Controllers\CrudController,
    Http\Requests\RecipeStore,
    Repositories\RecipeRepository};

class RecipeController extends CrudController
{
    protected
        $view  = 'recipe',
        $route  = 'recipe',
        $updateRequest   = RecipeStore::class,
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
