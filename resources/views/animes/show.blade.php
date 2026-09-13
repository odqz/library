@vite(['resources/js/anime-change-list-display.js'])

<x-layout.layout>
  <div class="flex gap-6">
    <div class="shrink-0">
      <img src="{{ $anime->cover_image_path }}" alt="" class="w-75 h-105">
      <div>
        <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $anime->title_english }}</h2>
        <p><span class="font-bold">Episodes:</span>@if($anime->episodes == NULL) null @else {{ $anime->episodes }} @endif</p>
        <p><span class="font-bold">Status:</span> {{ $anime->status }}</p>
        <p><span class="font-bold">Score:</span> {{ $anime->average_score }}</p>
        <p><span class="font-bold">Favourites:</span> {{ $anime->favourites }}</p>
        <p><span class="font-bold">Country:</span> {{ $anime->country_of_origin }}</p>
        <p><span class="font-bold">Adult:</span> @if($anime->is_adult == NULL) False @else True @endif</p>
        <div>
          <p><span class="font-bold">Genres:</span></p>
          @foreach($anime->genres as $genre)
            <p class="text-(--logo-blue)">- {{ $genre }}</p>
          @endforeach
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-4">
      <div>
        <h3 class="text-xl font-bold">Plot</h3>
        <p class="text-m">{{ $anime->description }}</p>
      </div>
      <div>
        <h3 class="text-xl font-bold">Staff</h3>
        <button class="anime-staff-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @foreach($anime->staff as $staff)
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
        <button class="anime-chars-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @foreach($anime->characters as $character)
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