<?php

namespace deploycodeApp;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
  protected $table= 'categories';
  protected $fillable = ['name','slug','description','icon'];

  public function posts(){
    $this->hasMany('deploycodeApp\Post');
  }
}
