<?php

namespace App\Http\Controllers\Backend;

use App\Models\Skil;
use App\Http\Requests\BackEnd\Skils\Store;

class Skils extends BackendController
{
    public function __construct( Skil $model)
    {
        parent::__construct($model);
    }
    public function store(Store $request)
    {   
      
        $this->model->create($request->all());
        
        return redirect()->route('skils.index');

    }
   
    public function update($id,Store $request)
    {
        $row = $this->model::findOrFail($id);
        $row->update($request->all());
        return redirect()->route('skils.edit',['id'=>$row]);
    }
}
