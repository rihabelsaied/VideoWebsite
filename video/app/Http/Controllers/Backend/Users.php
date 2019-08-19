<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BackEnd\Users\Store;
use App\Models\User;

use App\Http\Requests\BackEnd\Users\Update;

class Users extends BackendController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
   
   
    public function store(Store $request)
    {   
        $requestArray = $request->all();
        // dd($requestArray);
        $requestArray['password']=Hash::make($request['password']);
        $this->model->create($requestArray);
        
        return redirect()->route('users.index');

    }
   
    public function update($id,Update $request)
    {
        $user = $this->model::findOrFail($id);
        $arrayRequest =$request->all();
          
        // to make sure enter password not empty
        if(isset($arrayRequest['password']) and $arrayRequest['password']!= "")
        {
            $arrayRequest['password'] = Hash::make($request['password']);
          
        }
        // to store oldest pass if user dont update 
        else{
            unset($arrayRequest['password']);
        }
        // dd($arrayRequest);
        $user->update($arrayRequest);
        return redirect()->route('users.edit',['id'=>$user]);
    }
    
}
