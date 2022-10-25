<?php

namespace YannSoaz\LaravelSEO\Traits;

use YannSoaz\LaravelSEO\Models\SEO;

trait HasSEO {
  
  protected function defaultImageSEO () {
    return false;
  }


  public function seo () {
    return $this->morphOne(SEO::class, 'content_type', 'content_id');
  }

  public function seoFields () {
    return '';
  }

  public function seoHeader () {
    return views('ys-seo::edit');
  }

  public function setSEO (SEO $seo) {
    $this->seo()->save($seo);
  }
}