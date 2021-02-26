<?php

namespace App\Http\Resources;

use Illuminate\{Http\Request,
    Http\Resources\Json\JsonResource,
    Support\Collection
};

class IngredientResource extends JsonResource
{
    /**
     * AdminResource constructor.
     * @param $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return Collection
     */
    public function toArray($request): Collection
    {
        return new Collection([
            'id' => $this->id,
            'name' => $this->name,
            'measure' => $this->measure,
            'supplier' => $this->supplier,
        ]);
    }
}
