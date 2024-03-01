<?php

namespace App\Http\Controllers;

use App\DTO\CategoryDto;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    private $_repo = null;
    private $_directory = 'category';
    private $_route = 'category';

    public function __construct(CategoryRepository $repo){
        $this->_repo = $repo;
    }

    public function index(){
        $data['all'] = $this->_repo->index();
        return view($this->_directory . '.all' , compact('data'));
    }

    public function create(){
        $data['all'] = $this->_repo->index();
        return view($this->_directory . '.create' , compact('data'));
    }

    public function store(CategoryRequest $request){
        try {
            $this->_repo->store(CategoryDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success' , 'Created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route($this->_route . '.index')->with('error' , 'Something went wrong.');
        }
    }

    public function show($id){
        $data = $this->_repo->show($id);
        return view($this->_directory . '.show' , compact('data'));
    }

    public function edit($id){
        $allCategories = $this->_repo->index($id);
        $data = $this->_repo->show($id);
        return view($this->_directory . '.edit' , compact('data','allCategories'));
    }

    public function update(CategoryRequest $request ,$id){
        try {
            $this->_repo->update($id, CategoryDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success' , 'Updated successfully.');
        } catch (\Throwable $th) {
            if($th instanceof NotFoundHttpException) {
                $message = $th->getMessage();
                return redirect()->route($this->_route . '.index')->with('error' , $message);
            }else{
                return redirect()->route($this->_route . '.index')->with('error' , 'Something went wrong.');
            }
        }
    }

    public function destroy($id)
    {
        $this->_repo->destroy($id);
        return redirect()->route($this->_route . '.index')->with('success' , 'Deleted successfully.');
    }
}
