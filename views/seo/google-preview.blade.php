<div class="bg-white rounded-lg p-3 mt-3">
  <style>
    .searchresult {
      margin-left: 8px;
    }

    .searchresult h2 {
      font-size: 19px;
      line-height: 18px;
      font-weight: normal;
      color: rgb(29, 1, 189);
      margin-bottom: 0px;
    }

    .searchresult a {
      font-size: 14px;
      line-height: 14px;
      color: green;
      margin-bottom: 0px;
    }

    .searchresult button {
      font-size: 10px;
      line-height: 14px;
      color: green;
      margin-bottom: 0px;
      padding: 0px;
      border-width: 0px;
      background-color: white;
    }

    .searchresult p {
      width: 625px;
      max-width: 90%;
      font-size: 13px;
      margin-top: 0px;
      color: rgb(82, 82, 82);
    }
  </style>
  
  <div class="searchresult">
    <h2>
      @if(!empty($title)) 
        {{ $title }} 
      @else
        Lock (computer science) - Wikipedia
      @endif
    </h2>
    <a>
      @if(!empty($link)) 
        {{ $link }} 
      @else
        https://en.wikipedia.org/wiki/Lock_(computer_science)
      @endif
    </a> <button>▼</button>
    <p>
      @if(!empty($description)) 
        {{ $description }} 
      @else
        In computer science, a lock or mutex (from mutual exclusion) is a synchronization mechanism for enforcing limits on access to a resource in an
      @endif
    </p>
  </div>
</div>
