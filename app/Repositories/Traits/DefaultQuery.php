<?php


namespace App\Repositories\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Trait DefaultQuery
 * @package App\Http\Controllers\Traits
 * @property Builder $model
 */
trait DefaultQuery
{
    /**
     * @var Builder|Model $model
     */
    protected $model;

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @return Collection|Model[]
     */
    public function findAll()
    {
        return $this->model->all();
    }

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @return Builder|Model
     */
    public function findBy(array $criteria, array $orderBy = null)
    {
        return $this->model->where($criteria);
    }

    /**
     * @param string $email
     * @return Builder
     */
    public function findByEmail(string $email)
    {
        return $this->model->where('email', '=', $email)->first();
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findOneBy($column, $value)
    {
        return $this->model->where($column, '=', $value)->first();
    }

    /**
     * @param array $where
     * @return bool
     */
    public function exists(array $where)
    {
        $std_class = get_class($this->model);
        /**
         * @var Builder $model
         */
        $model = new $std_class();
        return $model->where($where)->exists();
    }


    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function firstOrCreate(array $data)
    {
        return $this->model->firstOrCreate($data);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * @param $pages
     * @return mixed
     */
    public function paginate($pages)
    {
        return $this->model->paginate($pages);
    }

}
