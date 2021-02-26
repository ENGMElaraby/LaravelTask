<?php
namespace App\Classes\Controllers;

trait CrudHelper
{
    private function checkMethodExists()
    {

    }

    /**
     * @return string
     */
    protected function homeRedirect(): string
    {
        return $this->route . 'index';
    }
}
