<div class="mt-3 w-full p-3 rounded-md bg-white bg-opacity-30">
  @if ($content)
    <div class="inline-flex border-b border-gray-200 dark:border-gray-700 mb-4">
      @php
        $active = 'flex items-center h-10 px-2 py-2 -mb-px text-center text-blue-600 bg-transparent border-b-2 border-blue-500 sm:px-4 -px-1 dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none';
        $neutre = 'flex items-center h-10 px-2 py-2 -mb-px text-center text-gray-700 bg-transparent border-b-2 border-transparent sm:px-4 -px-1 dark:text-white whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400';
      @endphp
      <button wire:click="$set('tab', 'google')" class="@if($tab === 'google') {{$active}} @else {{$neutre}} @endif">
          Google
      </button>
      <button wire:click="$set('tab', 'open-graph')" class="@if($tab !== 'google') {{$active}} @else {{$neutre}} @endif">
          Open-Graph
      </button>
    </div>
    <div @if($tab !== 'google') class="hidden" @endif>
      <diV>
        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">title</label>
        <input wire:model="seo.title" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" type="text" name="" id="">
      </div>
      <diV>
        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">description</label>
        <textarea wire:model="seo.description" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" type="text" name="" id=""></textarea>
      </div>
      @include('ys-seo::seo.google-preview', [...$seo, 'link' => $content->getContentLink()])  
    </div>
    <div @if($tab === 'google') class="hidden" @endif>
      <diV>
        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">open-graph title</label>
        <input wire:model="seo.social_image" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" type="file" name="" id="">
      </div>
      <diV>
        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">open-graph title</label>
        <input wire:model="seo.social_title" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" type="text" name="" id="">
        <p class="text-xs text-right">caractères restants : <span class="text-bold">{{(60 - strlen($seo['social_title']))}}</span></p>
      </div>
      <diV>
        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">open-graph description</label>
        <textarea wire:model="seo.social_description" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" type="text" name="" id=""></textarea>
        <p class="text-xs text-right">caractères restants : <span class="text-bold">{{(160 - strlen($seo['social_description']))}}</span></p>
      </div>
      @include('ys-seo::seo.facebook-preview', [...$seo, 'image' => $content->getSeoImage()])
    </div>
  @else
    <div class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
      <div class="flex items-center justify-center w-12 bg-red-500">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
          </svg>
      </div>

      <div class="px-4 py-2 -mx-3">
          <div class="mx-3">
              <span class="font-semibold text-red-500 dark:text-red-400">Erreur de contenu</span>
              <p class="text-sm text-gray-600 dark:text-gray-200">
                  Aucun contenu fournis ou le contenu n'implémente pas le trait "HasSEO".
              </p>
          </div>
      </div>
    </div>
  @endif
</div>