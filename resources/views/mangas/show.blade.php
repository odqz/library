@vite(['resources/js/manga-change-list-display.js'])

<x-layout.layout>
  <div class="flex gap-6">
    <div class="shrink-0">
      <img src="{{ $manga["coverImage"]["extraLarge"] }}" alt="" class="w-75 h-105">
      <div>
        <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $manga["title"]["english"] }}</h2>
        <p><span class="font-bold">Volumes:</span>@if($manga["volumes"] == NULL) null @else {{ $manga["volumes"] }} @endif</p>
        <p><span class="font-bold">Chapters:</span>@if($manga["chapters"] == NULL) null @else {{ $manga["chapters"] }} @endif</p>
        <p><span class="font-bold">Status:</span> {{ $manga["status"] }}</p>
        <p><span class="font-bold">Score:</span> {{ $manga["averageScore"] }}</p>
        <p><span class="font-bold">Favourites:</span> {{ $manga["favourites"] }}</p>
        <p><span class="font-bold">Country:</span> {{ $manga["countryOfOrigin"] }}</p>
        <p><span class="font-bold">Adult:</span> @if($manga["isAdult"] == NULL) False @else True @endif</p>
        <div>
          <p><span class="font-bold">Genres:</span></p>
          @foreach($manga["genres"] as $genre)
            <p class="text-(--logo-blue)">- {{ $genre }}</p>
          @endforeach
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-4">
      <div>
        <h3 class="text-xl font-bold">Plot</h3>
        <p class="text-m">{{ $manga["description"] }}</p>
      </div>
      <div>
        <h3 class="text-xl font-bold">Staff</h3>
        <button class="manga-staff-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @for($i = 0; $i < sizeof($manga["staff"]["edges"]); $i++)
            <div class="w-25 staff">
              <img src="{{ $manga["staff"]["edges"][$i]["node"]["image"]["medium"] }}" alt="">
               <p class="text-sm font-bold">{{ $manga["staff"]["edges"][$i]["node"]["name"]["full"] }}</p>
               <p class="text-sm">{{ $manga["staff"]["edges"][$i]["role"] }}</p>
            </div>
          @endfor
        </div>
      </div>
      <div>
        <h3 class="text-xl font-bold">Characters</h3>
        <button class="manga-chars-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @for($i = 0; $i < sizeof($manga["characters"]["edges"]); $i++)
            <div class="w-25 char">
              <img src="{{ $manga["characters"]["edges"][$i]["node"]["image"]["medium"] }}" alt="">
               <p class="text-sm font-bold">{{ $manga["characters"]["edges"][$i]["node"]["name"]["full"] }}</p>
               <p class="text-sm">{{ $manga["characters"]["edges"][$i]["role"] }}</p>
            </div>
          @endfor
        </div>
      </div>
    </div>
  </div>
</x-layout.layout>