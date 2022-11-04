<?php

namespace YannSoaz\LaravelSEO;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use YannSoaz\LaravelSEO\Models\SEO;
use YannSoaz\LaravelSEO\Traits\HasSEO;

class SEOEditComponent extends Component
{
  use WithFileUploads;

  const SAVE_EVENT = 'save_seo';
  const SAVE_END = 'save_seo_end';

  public $tab = 'google';

  protected $listeners = [
    'save_seo' => 'save'
  ];

  public $content = false;
  public $seo = [
    'description' => '',
    'title' => '',
    'social_title' => '',
    'social_description' => '',
    'social_image' => null
  ];

  protected $rules = [
    'seo.title' => 'required|string',
    'seo.description' => 'required|string',
    'seo.social_title' => 'nullable|string',
    'seo.social_description' => 'nullable|string',
    'seo.social_image' => 'image|nullable',
  ];

  public function mount ($content) {
    if ( in_array(HasSEO::class, class_uses_recursive($content::class)) ) {
      $this->content = $content;
      $seo = $content->seo;
      if ($seo) {
        $this->seo['description'] = $seo->description;
        $this->seo['title'] = $seo->title;
        $this->seo['social_title'] = $seo->social_title;
        $this->seo['social_description'] = $seo->social_description;
      }
    } else {
      $this->content = false;
    }
  }

  public function save () {
    if (!$this->content)
      return;
    $contentSEO = $this->content->seo;
    if (!$contentSEO) {
      $seo = new SEO();
      $seo->title = $this->seo['title'];
      $seo->description = $this->seo['description'];
      $seo->social_title = $this->seo['social_title'];
      $seo->social_description = $this->seo['social_description'];
      $this->saveImage($seo);
      $this->content->setSEO($seo);
      return;
    }
    $contentSEO->title = $this->seo['title'];
    $contentSEO->description = $this->seo['description'];
    $contentSEO->social_title = $this->seo['social_title'];
    $contentSEO->social_description = $this->seo['social_description'];
    $this->saveImage($contentSEO);
    $contentSEO->save();
    $this->emit(static::SAVE_END);
  }

  protected function saveImage (SEO &$seo) {
    if (!empty($this->seo['social_image'])) {
      $name = 'social_'.Str::random().'.'.$this->seo['social_image']->extension();
      $this->seo['social_image']->storeAs('seo_img', $name, 'public');
      $seo->setImage($name);
    }
  }

  public function render() {
      return view('ys-seo::seo.edit-livewire');
  }
  
}
