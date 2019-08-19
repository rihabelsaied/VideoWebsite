<?php 
namespace App\Http\Controllers\Backend;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

trait CommentTrait{
    public function commentStore(Store $request)
    {   
        
    $requestArray=$request->all() + ['user_id' => Auth::id()];
    Comment::create($requestArray);
    return redirect()->route('videos.edit',$requestArray['video_id']);
    
    }

}
