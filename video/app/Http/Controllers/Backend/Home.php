<?php

namespace App\Http\Controllers\Backend;
use App\Models\User;



class Home extends BackendController
{   
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
   
    public function index()
    {
        return view('back-end.home');
    }
}
