
<article class="common-post">
  <style>
  :root {
  /* colors */
  --main-color: #1877f2;
  --text-color: #050505;
  --full-color: 255 255 255;
  --empty-color: 0 0 0;
  /* white default*/
  --abalance1: rgba(var(--full-color) / 1);
  --abalance80: rgba(var(--full-color) / 0.8);
  /* black default*/
  --balance1: rgb(var(--empty-color) / 0.05);
  --balance2: rgb(var(--empty-color) / 0.1);
  --balance3: rgb(var(--empty-color) / 0.15);
  --balance4: rgb(var(--empty-color) / 0.2);
  --balance8: rgb(var(--empty-color) / 0.6);
  --balance10: rgb(var(--empty-color) / 0.8);
  --balance-full: #f0f2f5;
  /* sizes */
  --height-header: 40px;
  /* common sizes */
  --size1: 4px;
  --size2: calc(var(--size1) * 2);
  --size3: calc(var(--size1) * 3);
  --size4: calc(var(--size1) * 4);
}
    /* post parts */
.common-content {
  padding: var(--size3) var(--size4);
  padding-block-end: var(--size1);
  margin-block-end: var(--size4);
  margin-block-start: var(--size4);
  background-color: var(--abalance1);
  border-radius: var(--size2);
  box-shadow: 0 1px 2px var(--balance4);
  width: 100%;
  max-width: 600px;
}

.embed-content {
  display: block;
  background-color: var(--balance1);
  margin: 16px -16px;
}
.embed-content-text {
  padding: var(--size3) var(--size4);
}
.embed-content-info {
  text-transform: uppercase;
  color: var(--balance8);
  font-size: 13px;
  margin-bottom: var(--size1);
}
.embed-content-title {
  font-weight: bold;
  color: #333333;
}
.embed-content-paragraph {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  display: block;
  color: var(--balance8);
}
.embed-content-image {
  width: 100%;
}
  </style>
  <div class="common-post-content common-content">
    <a class="embed-content" href="https://medium.com/@elad/why-the-world-needs-css-developers-318025a6f5c1" target="_blank">
      @if (!empty($social_image))
        <img class="embed-content-image" src="{{ $social_image->temporaryUrl() }}" alt="">
      @elseif ($image) 
        <img class="embed-content-image" src="{{$image}}" alt="">
      @endif
      <div class="embed-content-text">
        <aside class="embed-content-info"><span class="text">{{$_SERVER['SERVER_NAME']}}</span></aside>
        <h2 class="embed-content-title">
          @if(!empty($social_title)) 
            {{ $social_title }} 
          @elseif(!empty($title)) 
            {{ $title }} 
          @else
            Lock (computer science) - Wikipedia
          @endif
        </h2>
        <p class="embed-content-paragraph">
          @if(!empty($social_description)) 
            {{ $social_description }} 
          @elseif(!empty($description)) 
            {{ $description }} 
          @else
            In computer science, a lock or mutex (from mutual exclusion) is a synchronization mechanism for enforcing limits on access to a resource in an
          @endif  
        </p>
      </div>
    </a>
  </div>
</article>