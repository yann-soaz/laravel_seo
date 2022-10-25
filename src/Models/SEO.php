<?php

namespace YannSoaz\LaravelSEO\Models;

use Illuminate\Database\Eloquent\Model;

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
      'fb_title',
      'fb_description',
      'fb_image',
      'tw_title',
      'tw_description',
      'tw_image',
  ];

  public function content () {
    return $this->morphTo(__FUNCTION__, 'content_type', 'content_id');
  }
}
