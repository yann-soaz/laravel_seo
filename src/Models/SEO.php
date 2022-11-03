<?php

namespace YannSoaz\LaravelSEO\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SEO extends Model {

  public $timestamps = false;
  protected $table = 'seo';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
      'title',
      'description',
      'social_title',
      'social_description',
      'social_image',
  ];

  public static function boot()
  {
    parent::boot();
  
      // After item is created
    static::deleted(function($item) {
      $image = $item->social_image;
      if (!empty($image)) {
        Storage::disk('public')->delete('seo_img/'.$image);
      }
    });
  }

  public function content () {
    return $this->morphTo(__FUNCTION__, 'content_type', 'content_id');
  }

  public function imagePath () {
    if(!empty($this->social_image)) {
      return asset('storage/seo_img/'.$this->social_image);
    }
    return false;
  }

  public function setImage ($img_name) {
    if (!empty($this->social_image)) {
      Storage::disk('public')->delete('seo_img/'.$this->social_image);
      $this->social_image = $img_name;
    } else {
      $this->social_image = $img_name;
    }
  }
}
