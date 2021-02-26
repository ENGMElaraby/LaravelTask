<?php
namespace App\Classes\Breadcrumbs;

class Breadcrumb
{
    private $name;

    /**
     * Breadcrumb constructor.
     * @param $name
     */
    public function __construct(?string $name)
    {
        $this->name = $name;
    }

    public function __invoke()
    {
        return $this->name;
    }

}
