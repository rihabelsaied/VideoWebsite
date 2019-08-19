<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Requests\BackEnd\Categories\Store;

class Categories extends BackendController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
   
   
    public function store(Store $request)
    {   
      
        $this->model->create($request->all());
        
        return redirect()->route('categories.index');

    }
   
    public function update($id,Store $request)
    {
        $row = $this->model::findOrFail($id);
        $row->update($request->all());
        return redirect()->route('categories.edit',['id'=>$row]);
    }
   
}
