<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\BackEnd\Tags\Store;

use App\Models\Tag;

class Tags extends BackendController
{
    public function __construct( Tag $model)
    {
        parent::__construct($model);
    }
    public function store(Store $request)
    {   
      
        $this->model->create($request->all());
        
        return redirect()->route('tags.index');

    }
   
    public function update($id,Store $request)
    {
        $row = $this->model::findOrFail($id);
        $row->update($request->all());
        return redirect()->route('tags.edit',['id'=>$row]);
    }
}
