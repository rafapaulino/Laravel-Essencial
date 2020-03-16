<?php 

namespace LaravelEssencial;
use Carbon\Carbon;

class Repository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function delete($id)
    {
        $obj = $this->model::withTrashed()->find($id);

        if (!is_null($obj)) {
            
            if ($obj->trashed())
                return $obj->forceDelete();
            else
                return $obj->delete();
        }
    }

    public function create($formData)
    {       
        return $this->model->create($formData);
    }

    public function update($formData, $id)
    {
        return $this->model->find($id)->update($formData);
    }

    public function show($id)
    {
        return $this->model->find($id);
    }
}