<?php

namespace deploycodeApp;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
  protected $table = 'tags';
  protected $fillable = ['name','slug'];

  public function posts(){
    return $this->belongsToMany('deploycodeApp\Post');
  }
}
