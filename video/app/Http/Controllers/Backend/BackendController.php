<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackendController extends Controller
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function index(){
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if(!empty($with))
        {
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(10);
        $modulName =$this->getModul();
        $pageTitle = "control ".$modulName;
        $pageDesc = "Here you can add/edit/delete ".$modulName;
        $routeName =$this->getClassNameFromModel();
        
        // dd($this->getClassNameFromModel());
        return view('back-end.'.$this->getClassNameFromModel().'.index',compact(['rows','modulName','pageTitle','pageDesc','routeName']));

    }
    public function create()
    {
        $modulName =$this->getModul();
        $pageTitle = "control ".$modulName;
        $pageDesc = "Here you can add ".$modulName;
        $routeName =$this->getClassNameFromModel();
        $append = $this->append();

        
        return view('back-end.'.$this->getClassNameFromModel().'.new',compact(['modulName','pageTitle','pageDesc','routeName']))->with($append);
    }
    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
    public function edit($id)
    {   $modulName =$this->getModul();
        $pageTitle = "control ".$modulName;
        $pageDesc = "Here you can edit ".$modulName;
        $routeName =$this->getClassNameFromModel();
        $append=$this->append();

        $row=$this->model->findOrFail($id);
        return view('back-end.'.$this->getClassNameFromModel().'.edit',compact('row','pageTitle','pageDesc','routeName','modulName'))->with($append);
    }
    protected function filter($rows)
    {
        return $rows;
    }
     protected function getClassNameFromModel()
     {
       return strtolower($this->pluralModelName());
     }
     protected function pluralModelName()
     {
         return str_plural($this->getModul());
     }
     protected function getModul()
     {
         return class_basename($this->model);
     }
     protected function with()
    {
        return [];
    }
    protected function append()
    {
        return [];
    }
}