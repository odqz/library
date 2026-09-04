@vite(['resources/js/anime-change-list-display.js'])

<x-layout.layout>
  <div class="flex gap-6">
    <div class="shrink-0">
      <img src="{{ $anime["coverImage"]["extraLarge"] }}" alt="" class="w-75 h-105">
      <div>
        <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $anime["title"]["english"] }}</h2>
        <p><span class="font-bold">Episodes:</span>@if($anime["episodes"] == NULL) null @else {{ $anime["episodes"] }} @endif</p>
        <p><span class="font-bold">Status:</span> {{ $anime["status"] }}</p>
        <p><span class="font-bold">Score:</span> {{ $anime["averageScore"] }}</p>
        <p><span class="font-bold">Favourites:</span> {{ $anime["favourites"] }}</p>
        <p><span class="font-bold">Country:</span> {{ $anime["countryOfOrigin"] }}</p>
        <p><span class="font-bold">Adult:</span> @if($anime["isAdult"] == NULL) False @else True @endif</p>
        <div>
          <p><span class="font-bold">Genres:</span></p>
          @foreach($anime["genres"] as $genre)
            <p class="text-(--logo-blue)">- {{ $genre }}</p>
          @endforeach
        </div>
        <form action="" method="post">
          <button class="bg-(--good-green) text-(--text-white) mt-2 py-0.5 px-1 w-full cursor-pointer" type="button">Add to library</button>
        </form>
      </div>
    </div>
    <div class="flex flex-col gap-4">
      <div>
        <h3 class="text-xl font-bold">Plot</h3>
        <p class="text-m">{{ $anime["description"] }}</p>
      </div>
      <div>
        <h3 class="text-xl font-bold">Staff</h3>
        <button class="anime-staff-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @for($i = 0; $i < sizeof($anime["staff"]["edges"]); $i++)
            <div class="w-25 staff">
              <img src="{{ $anime["staff"]["edges"][$i]["node"]["image"]["medium"] }}" alt="">
               <p class="text-sm font-bold">{{ $anime["staff"]["edges"][$i]["node"]["name"]["full"] }}</p>
               <p class="text-sm">{{ $anime["staff"]["edges"][$i]["role"] }}</p>
            </div>
          @endfor
        </div>
      </div>
      <div>
        <h3 class="text-xl font-bold">Characters</h3>
        <button class="anime-chars-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @for($i = 0; $i < sizeof($anime["characters"]["edges"]); $i++)
            <div class="w-25 char">
              <img src="{{ $anime["characters"]["edges"][$i]["node"]["image"]["medium"] }}" alt="">
               <p class="text-sm font-bold">{{ $anime["characters"]["edges"][$i]["node"]["name"]["full"] }}</p>
               <p class="text-sm">{{ $anime["characters"]["edges"][$i]["role"] }}</p>
            </div>
          @endfor
        </div>
      </div>
    </div>
  </div>
</x-layout.layout>