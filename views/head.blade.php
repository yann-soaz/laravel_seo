@if($seo)
  <title>{{ $seo->title }}</title>
  <meta property="description" content="{{ $seo->description }}" />
  @if(!empty($seo->social_title))
    <meta property="og:title" content="{{ $seo->social_title }}" />
  @else
    <meta property="og:title" content="{{ $seo->title }}" />
  @endif
  @if(empty($seo->social_description))
    <meta property="og:description" content="{{ $seo->description }}" />
  @else
    <meta property="og:description" content="{{ $seo->social_description }}" />
  @endif
  @if ($url)
    <meta property="og:url" content="{{ $url }}" />
  @endif
  @if($seo->imagePath())
    <meta property="og:image" content="{{ $seo->imagePath() }}" />
  @endif
@else
  <title>{{ config('app.name', 'Laravel') }}</title>
@endif