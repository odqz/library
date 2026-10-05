@vite(['resources/js/change-list-display.js'])

@php
  $start_date = explode("-", $media->start_date);
  $end_date = explode("-", $media->end_date);
@endphp

<x-layout.layout title="{{ $media->title_english != null ? $media->title_english : $media->title_romaji }}">
  <div class="flex gap-6">
    <div class="shrink-0">
      <img src="{{ $media->cover_image_path }}" alt="" class="w-75 h-105">
      <div>
        <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $media->title_english }}</h2>
        @if ($type == 'manga')
          <p><span class="font-bold">Volumes:</span>@if($media->volumes == NULL) null @else {{ $media->volumes }} @endif</p>
          <p><span class="font-bold">Chapters:</span>@if($media->chapters == NULL) null @else {{ $media->chapters }} @endif</p>
        @elseif ($type == 'anime' && $media->episodes > 1)
          <p><span class="font-bold">Episodes:</span>{{ $media->episodes }}</p>
        @endif
        <p><span class="font-bold">Status:</span> {{ $media->status }}</p>
        <p><span class="font-bold">Score:</span> {{ $media->average_score }}</p>
        <p><span class="font-bold">Country:</span> {{ $media->country_of_origin }}</p>
        <p><span class="font-bold">Start date:</span> {{ "{$start_date[2]}/{$start_date[1]}/{$start_date[0]}" }}</p>
        <p><span class="font-bold">End date:</span> {{ "{$end_date[2]}/{$end_date[1]}/{$end_date[0]}" }}</p>
        <div>
          <p><span class="font-bold">Genres:</span></p>
          @foreach($media->genres as $genre)
            <p class="text-(--logo-blue)">- {{ $genre }}</p>
          @endforeach
        </div>
        <div class="flex">
          @if ($inLibrary == true)
            <a href="/users/{{ Auth::user()->id }}" class="bg-(--text-white) w-max mt-2 py-0.5 flex-1 text-center">In library</a>
          @else
            @if ($type == 'manga')
              <a href="/readings/new/{{ $media->id }}" class="text-(--text-white) bg-(--good-green) w-max mt-2 py-0.5 flex-1 text-center">Add to library</a>
            @else
              <a href="/watchings/new/{{ $media->id }}" class="text-(--text-white) bg-(--good-green) w-max mt-2 py-0.5 flex-1 text-center">Add to library</a>
            @endif
          @endif
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-4">
      <div>
        <h3 class="text-xl font-bold">Plot</h3>
        <p class="text-m">{!! $media->description !!}</p>
      </div>
      <div>
        <h3 class="text-xl font-bold">Staff</h3>
        <button class="staff-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @foreach($media->staff as $staff)
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
        <button class="chars-btn underline text-(--logo-blue) cursor-pointer text-sm">hide</button>
        <div class="flex flex-wrap gap-12">
          @foreach($media->characters()->orderByRaw("CASE role WHEN 'MAIN' THEN 1 WHEN 'SUPPORTING' THEN 2 WHEN 'BACKGROUND' THEN 3 END")->get() as $character)
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