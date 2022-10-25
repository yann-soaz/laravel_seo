<?php

namespace YannSoaz\LaravelSEO\Models;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model {

  public $timestamps = false;

  protected $table = 'seo-images';
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
      'name'
  ];

  
}
