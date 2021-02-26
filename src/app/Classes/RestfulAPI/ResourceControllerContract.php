<?php

namespace App\Classes\RestfulAPI;

use App\Classes\Responses\GeneralResponse;

interface ResourceControllerContract
{
    /**
     * @return GeneralResponse
     */
    public function index(): GeneralResponse;

    /**
     * @return GeneralResponse
     */
    public function store(): GeneralResponse;

    /**
     * @param int $id
     * @return GeneralResponse
     */
    public function update(int $id): GeneralResponse;

    /**
     * @param int $id
     * @return GeneralResponse
     */
    public function destroy(int $id): GeneralResponse;

    /**
     * @param int $id
     * @return GeneralResponse
     */
    public function status(int $id): GeneralResponse;
}
