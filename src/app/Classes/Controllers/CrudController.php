<?php

namespace App\Classes\Controllers;

use App\Http\Controllers\Controller;
use BadMethodCallException;
use Error;
use App\{Classes\Breadcrumbs\Breadcrumb,
    Classes\Repositories\RepositoryContract,
    Classes\Responses\GeneralResponse
};

class CrudController extends Controller implements CrudContract
{
    use CrudHelper;

    protected
        /**
         * determine which view.
         *
         * @var string|null
         */
        $view,

        /**
         * determine which route using.
         *
         * @var string|null
         */
        $route,

        /**
         * determine which repository.
         *
         * @var RepositoryContract
         */
        $repository,

        /**
         * determine which FormRequest use in store.
         *
         * @var string|null
         */
        $storeRequest,

        /**
         * determine which FormRequest use in update.
         *
         * @var string|null
         */
        $updateRequest,

        /**
         * determine the Breadcrumbs use it.
         *
         * @var string|null
         */
        $breadcrumb;

    /**
     * Controller constructor.
     * @param RepositoryContract $repository
     */
    public function __construct(RepositoryContract $repository)
    {
        $this->repository = $repository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return GeneralResponse
     */
    public function index(): GeneralResponse
    {
        return new GeneralResponse([
            'data' => $this->repository->index(),
            'view' => $this->view . '.index',
            'breadcrumbs' => new Breadcrumb($this->breadcrumb)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return GeneralResponse
     */
    public function create(): GeneralResponse
    {
        return new GeneralResponse([
            'data' => $this->repository->create([]),
            'view' => $this->view . '.create',
            'breadcrumbs' => new Breadcrumb($this->breadcrumb)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return GeneralResponse
     */
    public function store(): GeneralResponse
    {
        $this->checkRequestFile($this->storeRequest);
        $request = app($this->storeRequest);
        $this->repository->store($request->validated());
        return new GeneralResponse([
            'route' => $this->storeRedirect(),
            'alert' => ['type' => 'success', 'html' => 'Added new']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return GeneralResponse
     */
    public function show(int $id): GeneralResponse
    {
        return new GeneralResponse([
            'breadcrumbs' => new Breadcrumb($this->breadcrumb),
            'data' => $this->repository->show($id),
            'view' => $this->view . '.show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return GeneralResponse
     */
    public function edit(int $id): GeneralResponse
    {
        return new GeneralResponse([
            'breadcrumbs' => new Breadcrumb($this->breadcrumb),
            'data' => $this->repository->edit($id),
            'view' => $this->view . '.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return GeneralResponse
     */
    public function update(int $id): GeneralResponse
    {
        $this->checkRequestFile($this->updateRequest);
        $request = app($this->updateRequest);
        return new GeneralResponse([
            'data' => $this->repository->update($request->validated(), $id),
            'route' => $this->updateRedirect(),
            'alert' => ['type' => 'success', 'html' => 'Updated one']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return GeneralResponse
     */
    public function destroy(int $id): GeneralResponse
    {
        $this->repository->destroy($id);
        return new GeneralResponse([
            'message' => 'Request success, Delete specified resource from storage',
            'route' => $this->deleteRedirect(),
            'alert' => ['type' => 'success', 'html' => __('admin/Modules.delete')]
        ]);
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param int $id
     * @return GeneralResponse
     */
    public function status(int $id): GeneralResponse
    {
        $this->repository->status($id);
        return new GeneralResponse([
            'route' => $this->statusRedirect(),
            'alert' => ['type' => 'success', 'html' => 'updated']
        ]);
    }

    /**
     * Check Request file exists or not for exception
     */
    private function checkRequestFile($reqeustFile):void
    {
        if (empty($reqeustFile)) {
            throw new \RuntimeException('Please provide Request files');
        }
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed|string
     */
    public function __call($method, $parameters)
    {

        if (in_array($method, ['storeRedirect', 'updateRedirect', 'deleteRedirect', 'statusRedirect'])) {
            return $this->homeRedirect();
        }

        try {
            return $this->{$method}();
        } catch (Error | BadMethodCallException $e) {
            $pattern = '~^Call to undefined method (?P<class>[^:]+)::(?P<method>[^\(]+)\(\)$~';

            if (!preg_match($pattern, $e->getMessage(), $matches)) {
                throw $e;
            }

            if ($matches['class'] != get_class($this) || $matches['method'] != $method) {
                throw $e;
            }

            throw new BadMethodCallException(sprintf(
                'Call to undefined method %s::%s()', static::class, $method
            ));
        }
    }
}
