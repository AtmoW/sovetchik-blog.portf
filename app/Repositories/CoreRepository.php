<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 * @package App\Repositories
 */
abstract class CoreRepository
{
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return Model
     */
    abstract protected function getModelClass();

    /**
     * @return Model|\Illuminate\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
