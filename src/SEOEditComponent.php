<?php

namespace YannSoaz\LaravelSEO;

use Livewire\Component;

class SiteEdit extends Component
{
    public $content = false;

    public function mount ($content) {
      if (in_array(SomeTrait::class, class_uses_recursive($content::class))) {
        $this->content = $content;
      }
    }

    public function render() {
        return view('ys-seo::seo.edit');
    }
}
