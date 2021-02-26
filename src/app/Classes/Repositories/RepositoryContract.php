<?php

namespace App\Classes\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryContract
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @return mixed
     */
    public function index();

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function edit(int $id);

    /**
     * @param array $data
     * @param $id
     */
    public function update(array $data, $id): void;

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function status(int $id);

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;
}
