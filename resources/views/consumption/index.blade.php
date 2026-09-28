@vite(['resources/js/apply-filters.js', 'resources/js/hide-consumption-index.js'])

<x-layout.layout>
  <div class="flex justify-between">
    <div class="flex flex-col gap-8">
      <div class="flex flex-col gap-2">
        <h2 class="text-2xl text-(--logo-blue) font-bold">Animes</h2>
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
        <div class="hidden" id="hiding-animes">You are hiding your animes. To see them press the show button in the filter tab.</div>
      </div>
      <div class="flex flex-col gap-2">
        <h2 class="text-2xl text-(--logo-blue) font-bold">Mangas</h2>
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
        <div class="hidden" id="hiding-mangas">You are hiding your mangas. To see them press the show button in the filter tab.</div>
      </div>
    </div>

  <div class="flex flex-col items-start w-[20%] p-1 pb-2 border h-min">
    <h2 class="text-2xl text-(--logo-blue) font-bold">Filters</h2>
    <div class="flex flex-col items-start mb-1">
      <h3 class="text-m font-bold"">Animes ({{ $anime_count }})</h3>
      <form action="" class="px-2" id="anime-filter-form">
        <div>
          <label for="">Planned</label>
          <input type="checkbox" name="" id="">
        </div>
        <div>
          <label for="">Reading</label>
          <input type="checkbox" name="" id="">
        </div>
        <div>
          <label for="">Completed</label>
          <input type="checkbox" name="" id="">
        </div>
        <div>
          <label for="">Paused</label>
          <input type="checkbox" name="" id="">
        </div>
        <div>
          <label for="">Dropped</label>
          <input type="checkbox" name="" id="">
        </div>
      </form>
      <button class="text-(--logo-blue) underline cursor-pointer" type="button" id="hide-animes">Hide all</button>
    </div>
    <div class="flex flex-col items-start mb-2">
      <h3 class="text-m font-bold"">Mangas ({{ $manga_count }})</h3>
      <form action="" class="hide px-2" id="manga-filter-form">
        <div>
          <label for="">Planned</label>
          <input type="checkbox" name="" id="">
        </div>
        <div>
          <label for="">Reading</label>
          <input type="checkbox" name="" id="">
        </div>
        <div>
          <label for="">Completed</label>
          <input type="checkbox" name="" id="">
        </div>
        <div>
          <label for="">Paused</label>
          <input type="checkbox" name="" id="">
        </div>
        <div>
          <label for="">Dropped</label>
          <input type="checkbox" name="" id="">
        </div>
      </form>
      <button class="text-(--logo-blue) underline cursor-pointer" type="button" id="hide-mangas">Hide all</button>
    </div>
    <button class="bg-(--logo-blue) text-(--text-white) py-0.5 px-2 cursor-pointer" type="button" id="apply-filter-btn">Apply filters</button>
  </div>
</div>
</x-layout.layout>