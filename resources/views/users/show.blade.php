<x-layout.layout>
<div class="flex justify-between">
    <div class="flex flex-col gap-8">
    <div>
      <div class="flex flex-col">
        <div class="flex items-end">
          <h2 class="text-2xl text-(--logo-blue) font-bold">Animes</h2>
          <!-- <button type="submit" class="text-(--logo-blue) py-0.5 px-2 underline cursor-pointer">hide</button> -->
        </div>
      </div>
      <div class="flex flex-col gap-4">
        @php $anime_count = 0; @endphp
        @foreach($watchings as $watching)
          @php 
            $anime = $watching->anime;
            $anime_count += 1;
          @endphp
          <div class="flex gap-2">
            <div>
              <p>#{{ $anime_count = $anime_count < 10 ? "0$anime_count" : "$anime_count" }}</p>
            </div>
            <div class="flex gap-2">
              <div class="flex">
                <img src="{{ $anime->cover_image_path }}" 
                  alt="{{ $anime->title_english }} cover image"
                  class="w-20 h-28">
              </div>
              <div class="flex flex-col">
                @if($anime->title_english != NULL)
                  <a href="/animes/{{$anime->id}}" class="text-xl text-(--logo-blue) font-bold">{{ $anime->title_english }}</a>
                @else
                  <a href="/animes/{{$anime->id}}" class="text-xl text-(--logo-blue) font-bold">{{ $anime->title_romaji }}</a>
                @endif
                <p class="text-[#505050]">Score: {{ $watching->score }}/100</p>
                <p class="text-[#505050]">Status: {{ $watching->status }}</p>
                <div class="flex gap-2">
                  <a href="/watchings/{{ $watching->id }}/edit" class="text-(--text-white) bg-(--logo-blue) px-2 mt-1 cursor-pointer">View</a>
                  <form action="/watchings/{{ $watching->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-(--text-white) bg-(--bad-red) px-2 mt-1 cursor-pointer">Remove</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="flex flex-col gap-2">
      <div class="flex flex-col">
        <div class="flex items-end">
          <h2 class="text-2xl text-(--logo-blue) font-bold">Mangas</h2>
          <!-- <button type="submit" class="text-(--logo-blue) py-0.5 px-2 underline cursor-pointer">hide</button> -->
        </div>
      </div>
      <div class="flex flex-col gap-4">
        @php $manga_count = 0; @endphp
        @foreach($readings as $reading)
          @php 
            $manga = $reading->manga;
            $manga_count += 1;
          @endphp
          <div class="flex gap-2">
            <div>
            <p>#{{ $manga_count = $manga_count < 10 ? "0$manga_count" : "$manga_count" }}</p>
          </div>
          <div class="flex gap-2">
            <div class="flex">
              <img src="{{ $manga->cover_image_path }}" 
                alt="{{ $manga->title_english }} cover image"
                class="w-20 h-28">
            </div>
            <div class="flex flex-col">
              @if($manga->title_english != NULL)
                <a href="/mangas/{{ $manga->id }}" class="text-xl text-(--logo-blue) font-bold">{{ $manga->title_english }}</a>
              @else
                <a href="/mangas/{{ $manga->id }}" class="text-xl text-(--logo-blue) font-bold">{{ $manga->title_romaji }}</a>
              @endif
              <p class="text-[#505050]">Score: {{ $reading->score }}/100</p>
              <p class="text-[#505050]">Status: {{ $reading->status }}</p>
              <div class="flex gap-2">
                <a href="/readings/{{ $reading->id }}/edit" class="text-(--text-white) bg-(--logo-blue) px-2 mt-1 cursor-pointer">View</a>
                <form action="/readings/{{ $reading->id }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="text-(--text-white) bg-(--bad-red) px-2 mt-1 cursor-pointer">Remove</button>
                </form>
              </div>
            </div>
          </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="flex flex-col w-[20%] p-1 pb-2 border h-min ">
    <h2 class="text-2xl text-(--logo-blue) font-bold">Filters</h2>
    <div class="flex flex-col gap-4 px-1">
      <div>
        <h3 class="text-m font-bold"">Animes ({{ $anime_count }})</h3>
        <form action="" class="px-1">
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
        <button type="submit" class="text-(--logo-blue) underline cursor-pointer">Hide all</button>
      </div>

      <div>
        <h3 class="text-m font-bold"">Mangas ({{ $manga_count }})</h3>
        <form action="" class="px-1">
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
        <button type="submit" class="text-(--logo-blue) underline cursor-pointer">Hide all</button>
      </div>
    </div>
  </div>
</div>
</x-layout.layout>