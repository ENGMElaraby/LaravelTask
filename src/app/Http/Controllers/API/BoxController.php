<?php
namespace App\Http\Controllers\API;

use App\{Classes\RestfulAPI\ResourceController,
    Http\Requests\BoxStore,
    Http\Resources\BoxResource,
    Repositories\BoxRepository};

class BoxController extends ResourceController
{
    protected
        $pagination     = true,
        $perPage        = 6,
        $theResource    = BoxResource::class,
        $storeRequest   = BoxStore::class;

    /**
     * BoxController constructor.
     * @param BoxRepository $repository
     */
    public function __construct(BoxRepository $repository)
    {
        parent::__construct($repository);
    }

}
