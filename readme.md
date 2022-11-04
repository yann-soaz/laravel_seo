# Laravel SEO
Module [Laravel](https://laravel.com/) pour créer une gestion du SEO via [livewire](https://laravel-livewire.com/)

## Installation :

Pour commencer, installez le package puis lancez la migration afin de créer la table SEO qui va stocker vos informations.

    composer require yann-soaz/laravel_seo
    php artisan migrate

Si le Storage n'est pas encore lié, exécutez la commande suivante :

    php artisan storage:link
le Storage sera utilisé pour l'image mise en avant pour les balises open-graph.

## Exemple d'usage

Page.php

    <?php
    namespace  App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;    
    use YannSoaz\LaravelSEO\Traits\HasSEO;
    
    class  Page  extends  Model {
      use HasFactory, HasSEO; // utiliser HasSEO pour activer la gestion du seo
    }

views/livewire/page/edit-page.blade.php

    <form wire:submit.prevent="save">
      <input type="text" wire:model="page.title" />
      <textarea wire:model="page.content"></textarea>
      {{ $page->seoFields() }} {# pour afficher les champs de formulaire seo dans le composant livewire parent #}
    </form>

app/Http/Livewire/Page/EditPage.php

    <?php
    namespace  App\Http\Livewire\Page;
    
    use App\Models\Page;
    use Livewire\Component;
    use YannSoaz\LaravelSEO\SEOEditComponent;
    
    class  PageEdit  extends  Component
    {
    
      public  Page $page;
    
      protected  $rules =  [
        'page.title'  =>  'required|string',
        'page.content'  =>  'required|string',
      ];
    
      public  function  mount  (Page $page)  {
        $this->page =  $page;
      }
    
      public  function  save  ()  {
        $this->validate();
        $this->site->save();
        $this->emit(SEOEditComponent::SAVE_EVENT); // l'évènement SAVE_EVENT provoque l'enregistrement du seo
        // un autre evènement ( SEOEditComponent::SAVE_END ) peut être écouté pour détecter la fin de l'enregistrement des métas seo
      }
      public  function  render()  {
        return  view('livewire.site-edit');
      }
    }

views/pages/single.blade.php

    <x-app-layout>
    	<x-slot  name="head">
    		{{  $page->seoHeader()  }}
    	</x-slot>
    <div>
    	<h1>{{ $page->title }}</h1>
    	<div>{{ $page->content }}</div>
    </div>
    </x-app-layout>


## Documentation


le trait HasSEO accorde a votre modèle plusieurs fonctions utilisable

| Méthode | Description | Usage |
|--|--|--|
| public function seo () | retourne l'élément seo de la relation polymorphique | si vous avez besoin de charger les métas SEO |
| public function removeSEO () | supprime le SEO créé pour le contenu | automatique sur l'event listenner deleted du contenu parent, à utiliser dans les autres contextes |
| public function setSEO (SEO $seo) | Lie directement le modèle SEO au contenu | à utiliser si vous souhaitez gérer vous même la création du SEO |
| public function seoFields () | fait apparaitre les champs d'édition des métas SEO | à insérer dans un composant livewire |
| public function seoHeader () | créer les métas title, meta description, et les balises open-graph (title, description, image) | à insérer dans l'entête de vos pages |

Certaines fonctions peuvent être surchargées dans votre modèle :

| Méthode | Description | Usage |
|--|--|--|
| public function getContentLink () | retourne l'url de la page pour l'aperçu de recherche google | par défaut une url factice est chargée |
| public function getDefaultSeoImage () | Donne une url par défaut pour la méta og:image si aucune image n'est fournie | retourne faux par défaut |

Evènements :

| event | Description |
|--|--|--|
| SEOEditComponent::SAVE_EVENT | évènement à lancer pour provoquer l'enregistrement du seo dans le composant SEO |
| SEOEditComponent::SAVE_END | évènement lancé par le composant SEO lorsque l'enregistrement SEO est effectué |
