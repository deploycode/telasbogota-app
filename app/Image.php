<?php

namespace deploycodeApp;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Image extends Model
{
  protected $table ="images";
  protected $fillable = ['image', 'alt', 'post_id'];

  public function setImageAttribute($image){
    if (!empty($image)) {
      $new_name= $image->getClientOriginalName().Carbon::now()->format('Y-m-d-h-i-s').'.jpg';
      $this->attributes['image']= $new_name;
      \Storage::disk('local')->put($new_name,\File::get($image));
    }
  }
  public function post(){
    return $this->belongsTo('deploycodeApp\Post');
  }
}
