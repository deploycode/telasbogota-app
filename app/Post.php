<?php

namespace deploycodeApp;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
  use Sluggable;
  public function sluggable()
  {
      return [
          'slug' => [
              'source' => 'name'
          ]
      ];
  }
  protected $table = 'posts';
  protected $fillable = ['name','slug', 'price','content','state','category_id'];

  public function category(){
    return $this->belongsTo('deploycodeApp\Category');
  }
  public function tags(){
    return $this->belongsToMany('deploycodeApp\Tag');
  }
  public function images(){
    return $this->hasMany('deploycodeApp\Image');
  }
}
