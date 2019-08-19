<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $fillable =['user_id','video_id','body'];
   public function user()
   {
       return $this->belongsTo(User::class);
   }
   public function video()
   {
       return $this->belongsTo(Video::class);
   }

}
