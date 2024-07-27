<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;


abstract class Repository
{
    const perPage = 10;

    protected mixed $model;

    /*
     * this search is slow and use it in mini table
     */
    protected array $likeSearch = [];


    /*
     * when load list data you can define
     * in own repository-selectable columns
     */
    protected array $selectableList = [];



    /**
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->orderBy($this->getOrderByColumn(),$this->getOrderByType())->get($this->getColumns($columns));
    }

    /**
     * Paginate the given query.
     *
     * @param array $columns
     * @param array $relations
     * @return LengthAwarePaginator
     *
     * @throws InvalidArgumentException
     */
    public function paginate(array $columns = ['*'], array $relations = []): LengthAwarePaginator
    {
        return $this->model->with($relations)->orderBy($this->getOrderByColumn(),$this->getOrderByType())->paginate($this->getPerPage(), $this->getColumns($columns));
    }


    /**
     * Find model by id.
     *
     * @param int $modelId
     * @param array $columns
     * @param array $relations
     * @return Model|null
     */
    public function findById(
        int   $modelId,
        array $columns = ['*'],
        array $relations = [],
    ): ?Model
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId);
    }



    /**
     * @param string $filed
     *
     * @return $this
     */
    public function searchLike(string $filed = 'keyword'): static
    {
        if (request()->filled($filed) && !empty($this->likeSearch)) {
            $keyword = request()->input($filed);
            $columns = $this->likeSearch;
            $this->model = $this->model->where(function (Builder $q) use ($keyword, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', "%{$keyword}%");
                }
            });
        }
        return $this;
    }

    public function filter(): static
    {
        if (request()->filled('ids') && is_array(request()->input('ids'))) {
            $this->model = $this->model->whereIn('id', request()->input('ids'));
        }
        return $this;
    }


    public function with(
        array $relations = [],
    ): static
    {
        $this->model = $this->model->with($relations);
        return $this;
    }

    public function withCount(
        array $relations = [],
    ): static
    {
        $this->model = $this->model->withCount($relations);
        return $this;
    }

    /**
     * get Columns
     *
     * @param array $columns
     * @return array
     */
    public function getColumns(array $columns): array
    {
        return (!empty($this->selectableList[0]) && $columns[0] == '*') ? $this->selectableList : $columns;
    }

    private function getOrderByColumn()
    {
        return request()->exists('orderByColumn') ? request()->input('orderByColumn') : 'id';
    }

    private function getOrderByType()
    {
        return request()->exists('orderByType') ? request()->input('orderByType') : 'DESC';
    }

    private function getPerPage()
    {
        return request()->exists('perPage') ? request()->input('perPage') : self::perPage;
    }

}
