<?php

namespace App\Helper;

trait BaseQuery
{

    public function add($model, $data){
        return $model->create($data);
    }

    public function get_all($model, $relation = null){
        if($relation == null){
            return $model->all();
        }else{
            return $model->with($relation)->get();
        }
    }

    public function get_by_slug($model, $slug, $relation = null){
        if($relation == null){
            return $model->whereSlug($slug)->first();
        }else{
            return $model->with($relation)->whereSlug($slug)->first();
        }
    }

    public function get_by_id($model, $id, $relation = null){
        if($relation == null){
            return $model->find($id);
        }else{
            return $model->with($relation)->first($id);
        }
    }

    public function delete($model, $id)
    {
        return $model->findOrFail($id)->delete();
    }
}
