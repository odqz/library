@vite(['resources/js/hide-consumption-index.js'])
<x-layout.layout>
  <div class="flex justify-between">
    <div class="flex flex-col gap-8">
      <div class="flex flex-col gap-2">
        <div class="flex items-end gap-2">
          <h2 class="text-2xl text-(--logo-blue) font-bold">Animes</h2>
          <button class="text-(--logo-blue) underline cursor-pointer mb-1" type="button" id="hide-animes">hide</button>
        </div>
        @if ($watchings == null) 
          <div>No watching entries to display.</div>
        @elseif(sizeOf($watchings) < 1)
          <div>You have no watching entries.</div>
        @else
          <div class="flex flex-col gap-4" id="anime-index">
            @php $anime_count = 0; @endphp
            @foreach($watchings as $watching)
              @php 
                $anime = $watching->anime;
                $anime_count += 1;
              @endphp
              <x-media.card 
                rank="{{ $anime_count }}" 
                title="{{ $anime->title_english == null ? $anime->title_romaji : $anime->title_english }}" 
                average_score="{{ $watching->score }}" 
                status="{{ $watching->status }}" 
                cover_image_path="{{ $anime->cover_image_path }}" 
                url="/animes/{{ $anime->id }}"
              >
                <div class="flex gap-2">
                  <a href="/watchings/{{ $watching->id }}/edit" class="text-(--text-white) bg-(--good-green) px-2 mt-1 cursor-pointer">View</a>
                  <form action="/watchings/{{ $watching->id }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="text-(--text-white) bg-(--bad-red) px-2 mt-1 cursor-pointer">Remove</button>
                  </form>
                </div>
              </x-media.card>
            @endforeach
          </div>
          <div class="hidden" id="hiding-animes">You are hiding your animes. To see them press the show button above.</div>
        @endif
      </div>
      <div class="fflex flex-col gap-2">
        <div class="flex items-end gap-2">
          <h2 class="text-2xl text-(--logo-blue) font-bold">Mangas</h2>
          <button class="text-(--logo-blue) underline cursor-pointer mb-1" type="button" id="hide-mangas">hide</button>
        </div>
        @if($readings == null)
          <div>No reading entries to display.</div>
        @elseif(sizeOf($readings) < 1)
          <div>You have no reading entries.</div>
        @else
          <div class="flex flex-col gap-4" id="manga-index">
            @php $manga_count = 0; @endphp
            @foreach($readings as $reading)
              @php 
                $manga = $reading->manga;
                $manga_count += 1;
              @endphp
              <x-media.card 
                rank="{{ $manga_count }}" 
                title="{{ $manga->title_english == null ? $manga->title_romaji : $manga->title_english }}" 
                average_score="{{ $reading->score }}" 
                status="{{ $reading->status }}" 
                cover_image_path="{{ $manga->cover_image_path }}" 
                url="/mangas/{{ $manga->id }}"
              >
                <div class="flex gap-2">
                  <a href="/readings/{{ $reading->id }}/edit" class="text-(--text-white) bg-(--good-green) px-2 mt-1 cursor-pointer">View</a>
                  <form action="/readings/{{ $reading->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-(--text-white) bg-(--bad-red) px-2 mt-1 cursor-pointer">Remove</button>
                  </form>
                </div>
              </x-media.card>
            @endforeach
          </div>
          <div class="hidden" id="hiding-mangas">You are hiding your mangas. To see them press the show button above.</div>
        @endif
      </div>
    </div>

    <div class="flex flex-col items-start w-[16%] p-1 border h-min">
      <h2 class="text-2xl text-(--logo-blue) font-bold">Filters</h2>
      <div class="flex flex-col items-start mb-1">
        <form action="/users/{{ $user->id }}/filter/" class="hide px-1" id="filter-form">
          <div>
            <label for="planned">Planned</label>
            <input type="checkbox" name="planned" value="PLANNED" id="" {{ in_array("PLANNED", $checkedBoxes) ? 'checked' : null }}>
          </div>
          <div>
            <label for="reading">Reading</label>
            <input type="checkbox" name="reading" value="READING" id="" {{ in_array("READING", $checkedBoxes) ? 'checked' : null }}>
          </div>
          <div>
            <label for="watching">Watching</label>
            <input type="checkbox" name="watching" value="WATCHING" id="" {{ in_array("WATCHING", $checkedBoxes) ? 'checked' : null }}>
          </div>
          <div>
            <label for="completed">Completed</label>
            <input type="checkbox" name="completed" value="COMPLETED" id="" {{ in_array("COMPLETED", $checkedBoxes) ? 'checked' : null }}>
          </div>
          <div>
            <label for="paused">Paused</label>
            <input type="checkbox" name="paused" value="PAUSED" id="" {{ in_array("PAUSED", $checkedBoxes) ? 'checked' : null }}>
          </div>
          <div>
            <label for="dropped">Dropped</label>
            <input type="checkbox" name="dropped" value="DROPPED" id="" {{ in_array("DROPPED", $checkedBoxes) ? 'checked' : null }}>
          </div>
        </form>
        <button class="bg-(--logo-blue) text-(--text-white) py-0.25 px-2 mt-1 cursor-pointer" type="submit" form="filter-form">Apply filters</button>
      </div>
    </div>
  </div>
</x-layout.layout>