<?php

namespace App\Services;

use App\Models\Education;
use Illuminate\Support\Facades\Schema;

class EducationService
{
    /**
     * Service Model
     *
     * @var Model
     */
    public $model;

    /**
     * Pagination
     *
     * @var integer
     */
    public $pagination;

    /**
     * Service Constructor
     *
     * @param Education $education
     */
    public function __construct(Education $education)
    {
        $this->model        = $education;
        $this->pagination   = env('PAGINATION', 15);
    }

    /**
     * All Model Items
     *
     * @return array
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Paginated items
     *
     * @return LengthAwarePaginator
     */
    public function paginated()
    {
        return $this->model->paginate($this->pagination);
    }

    /**
     * Search the model
     *
     * @param  mixed $payload
     * @return LengthAwarePaginator
     */
    public function search($payload)
    {
        $query = $this->model->orderBy('created_at', 'desc');
        $query->where('name', 'LIKE', '%'.$payload.'%');

        $columns = Schema::getColumnListing('education');

        foreach ($columns as $attribute) {
            $query->orWhere($attribute, 'LIKE', '%'.$payload.'%');
        };

        return $query->paginate($this->pagination);
    }

    /**
     * Create the model item
     *
     * @param  array $payload
     * @return Model
     */
    public function create($payload)
    {
        return $this->model->create($payload);
    }

    /**
     * Find Model by ID
     *
     * @param  integer $id
     * @return Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Model update
     *
     * @param  integer $id
     * @param  array $payload
     * @return Model
     */
    public function update($id, $payload)
    {
        return $this->find($id)->update($payload);
    }

    /**
     * Destroy the model
     *
     * @param  integer $id
     * @return bool
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
