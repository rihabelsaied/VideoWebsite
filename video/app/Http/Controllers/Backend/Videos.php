<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\BackEnd\Videos\Store;

use App\Models\Video;
use App\Models\Category;
use App\Models\Skil;
use App\Models\Tag;


use Illuminate\Support\Facades\Auth;

class Videos extends BackendController
{
    use CommentTrait;
    public function __construct( Video $model)
    {
        parent::__construct($model);
    }
    protected function with()
    {
        return ['category','user'];
    }
    protected function append()
    {  
        $array =['categories' => Category::get(),
                  'skils' => Skil::get(),
                  'tags'=>Tag::get(),
                  'selectedSkils'=>[],
                  'selectedTags'=>[],
                  'comments'=>[]
    ];
    if( request()->route()->parameter('video'))
    {
        $array['selectedSkils']=$this->model->find(request()->route()->parameter('video'))
        ->skils()->pluck('skils.id')->toArray();

    
        $array['selectedTags']=$this->model->find(request()->route()->parameter('video'))
          ->tags()->pluck('tags.id')->toArray();

        $array['comments']=$this->model->find(request()->route()->parameter('video'))
        ->comments()->get();
    }

    return $array;
    }
    
    public function store(Store $request)
    {   // to upload image
        $fileName=$this->uploadImage($request);

        $requestArray = $request->all()+['user_id'=> Auth::id(),'image'=>$fileName];
        $row=$this->model->create($requestArray);
        $this->syncSkilsTags($row,$requestArray);


        return redirect()->route('videos.index')->with('msg','added');

    }
    
   
    public function update($id,Store $request)
    {   $requestArray = $request->all();
        if($request->hasFile('image'))
        {  
            $fileName=$this->uploadImage($request);

            $requestArray = ['image'=>$fileName]+ $requestArray;
        }
        $row = $this->model::findOrFail($id);
        $row->update($requestArray);

       $this->syncSkilsTags($row,$requestArray);

        return redirect()->route('videos.edit',['id'=>$row]);
    }
    
    
    protected function syncSkilsTags($row,$requestArray)
    {
         // to add skil in table m-m skils-videos
       if( isset($requestArray['skils']) && ! empty($requestArray['skils']))
       {
            $row->skils()->sync($requestArray['skils']);
       }
       if(isset($requestArray['tags']) && !empty($requestArray['tags']))
       {
           $row->tags()->sync($requestArray['tags']);
       }
    }
    protected function uploadImage($request)
    {
        $file = $request->file('image');
       
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'),$fileName);
        return $fileName;
    }
    
    
}
