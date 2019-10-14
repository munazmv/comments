<?php

namespace Modules\Core;

use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Auth\Services\AuthService;
use Modules\User\Models\User;

/**
 * Class BaseRepository
 *
 * @package Modules\Core
 */
abstract class BaseRepository
{
    /**
     * @var Eloquent
     */
    private $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $model = $this->model();

        if(!$model instanceof Eloquent && !$model instanceof  Model) {
            $repositoryName = get_class($this);
            throw new Exception("{$repositoryName} provided model is invalid");
        }

        $this->model = $model;
    }

    /**
     * Get the repository model
     *
     * @return Eloquent`
     */
    abstract protected function model();

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

    /**
     * Get authenticated user
     *
     * @return User
     */
    protected function currentUser()
    {
        return app(AuthService::class)->getAuthenticatedUser();
    }

    /**
     * Find by a given field or return null
     *
     * @param string g$field
     * @param string $value
     *
     * @return Eloquent
     */
    public function findByOrNull($field, $value)
    {
        return $this->query()->where($field, $value)->first();
    }

    /**
     * Get all records by the current user
     *
     * @return Collection
     */
    public function getAllByCurrentUser()
    {
        return $this->query()
            ->where('user_id', $this->currentUser()->id)
            ->orderByDesc('created_at')
            ->get();
    }
}
