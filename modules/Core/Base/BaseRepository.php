<?php

namespace Modules\Core;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class BaseRepository
 *
 * @package Modules\Core
 */
class BaseRepository
{
    /**
     * @var Eloquent
     */
    private $model;

    /**
     * BaseRepository constructor.
     *
     * @param Eloquent $model
     */
    public function __construct(Eloquent $model)
    {
        $this->model = $model;
    }

    /**
     * Find model or fail
     *
     * @param integer $id
     *
     * @return Eloquent
     */
    public function findOrFail($id)
    {
        $record = $this->findOrNull($id);

        if ($record === null) {
            throw new ModelNotFoundException("No record found on {$this->getModelName()} for [{$id}]");
        }

        return $record;
    }

    /**
     * Find model or null
     *
     * @param integer $id
     *
     * @return Eloquent
     */
    public function findOrNull($id)
    {
        return $this->query()
            ->where('id', $id)
            ->first();
    }

    /**
     * Get name of the model class
     *
     * @return string
     */
    private function getModelName()
    {
        return get_class($this);
    }

    /**
     * Get new query
     *
     * @return Builder
     */
    public function query()
    {
        return $this->model->newQuery();
    }

    /**
     * Create a record
     *
     * @param array $inputs
     *
     * @return Eloquent
     */
    public function create($inputs)
    {
        $record = $this->model->create($inputs);

        return $record;
    }

    /**
     * Update a record
     *
     * @param Eloquent $model
     * @param array    $inputs
     *
     * @return Eloquent
     */
    public function update(Eloquent $model, $inputs)
    {
        $model->update($inputs);

        return $model->fresh();
    }

    /**
     * Delete a record
     *
     * @param Eloquent $model
     *
     * @return bool
     */
    public function delete(Eloquent $model)
    {
        $model->delete();

        return true;
    }
}
