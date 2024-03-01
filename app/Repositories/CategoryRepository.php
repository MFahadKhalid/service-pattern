<?php

namespace App\Repositories;

use App\DTO\CategoryDto;
use App\Helper\BaseQuery;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository
{
    use BaseQuery;

    private $_model = null;


    public function __construct(Category $categoryModel){
        $this->_model = $categoryModel;
    }

    public function index(){
        return $this->get_all($this->_model);
    }

    public function getBySlug($slug){
        return $this->get_by_slug($this->_model, $slug);
    }

    public function store(CategoryDto $data){
        $dataArray = $data->toArray();
        $dataArray['slug'] = Str::slug($dataArray['name']);
        return $this->add($this->_model, $dataArray);
    }

    public function show($id){
        return $this->get_by_id($this->_model, $id);
    }

    public function update($id , CategoryDto $data){
        $dataArray = $data->toArray();
        $dataArray['slug'] = Str::slug($dataArray['name']);
        return $this->get_by_id($this->_model, $id)->update($dataArray);
    }

    public function destroy($id)
    {
        return $this->delete($this->_model, $id);
    }
}
