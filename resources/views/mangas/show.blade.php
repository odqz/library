@vite(['resources/js/manga-change-list-display.js'])

<x-layout.layout>
  <div class="flex gap-6">
    <div class="shrink-0">
      <img src="{{ $manga->cover_image_path }}" alt="" class="w-75 h-105">
      <div>
        <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $manga->title_english }}</h2>
        <p><span class="font-bold">Volumes:</span>@if($manga->volumes == NULL) null @else {{ $manga->volumes }} @endif</p>
        <p><span class="font-bold">Chapters:</span>@if($manga->chapters == NULL) null @else {{ $manga->chapters }} @endif</p>
        <p><span class="font-bold">Status:</span> {{ $manga->status }}</p>
        <p><span class="font-bold">Score:</span> {{ $manga->average_score }}</p>
        <p><span class="font-bold">Favourites:</span> {{ $manga->favourites }}</p>
        <p><span class="font-bold">Country:</span> {{ $manga->country_of_origin }}</p>
        <p><span class="font-bold">Adult:</span> @if($manga->is_adult == NULL) False @else True @endif</p>
        <div>
          <p><span class="font-bold">Genres:</span></p>
          @foreach($manga->genres as $genre)
            <p class="text-(--logo-blue)">- {{ $genre }}</p>
          @endforeach
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-4">
      <div>
        <h3 class="text-xl font-bold">Plot</h3>
        <p class="text-m">{{ $manga->description }}</p>
      </div>
      <div>
        <h3 class="text-xl font-bold">Staff</h3>
        <button class="manga-staff-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @foreach($manga->staff as $staff)
            <div class="w-25 staff">
              <img src="{{ $staff->image_path }}" alt="{{ $staff->name }} cover image">
              <p class="text-sm font-bold">{{ $staff->name }}</p>
              <p class="text-sm">{{ $staff->role }}</p>
            </div>
          @endforeach
        </div>
      </div>
      <div>
        <h3 class="text-xl font-bold">Characters</h3>
        <button class="manga-chars-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @foreach($manga->characters as $character)
            <div class="w-25 char">
              <img src="{{ $character->image_path }}" alt="{{ $character->name }} cover image">
              <p class="text-sm font-bold">{{ $character->name }}</p>
              <p class="text-sm">{{ $character->role }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-layout.layout>