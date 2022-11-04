<?php

namespace YannSoaz\LaravelSEO\Traits;

use YannSoaz\LaravelSEO\Models\SEO;

trait HasSEO {
  
  public static function boot()
  {
    parent::boot();
  
      // After item is created
    static::deleted(function($item) {
      $seo = $item->seo;
      if ($seo) {
        $seo->delete();
      }
    });
  }
  
  public function removeSEO () {
    if ($this->seo) {
      $this->seo->delete();
    }
  }

  public function getSeoImage () {
    if ($this->seo) {
      return $this->seo->imagePath();
    }
    return $this->getDefaultSeoImage();
  }

  public function getDefaultSeoImage () {
    return false;
  }


  public function getContentLink () {
    return false;
  }

  public function seo () {
    return $this->morphOne(SEO::class, 'content');
  }

  public function seoFields () {
    return view('ys-seo::edit', ['content' => $this]);
  }

  public function seoHeader () {
    return view('ys-seo::head', ['seo' => $this->seo, 'url' => $this->getContentLink()]);
  }

  public function setSEO (SEO $seo) {
    $this->seo()->save($seo);
  }

}