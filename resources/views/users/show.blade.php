<x-layout.layout>
  <div class="flex flex-col gap-8">
    <div>
      <h2 class="text-2xl text-(--logo-blue) font-bold">Animes</h2>
        <div class="flex flex-col gap-4">
          @php $x = 0; @endphp
          @foreach($watchings as $watching)
            @php 
              $anime = $watching->anime;
              $x += 1;
            @endphp
            <div class="flex gap-2">
              <div>
              <p>#{{ $x }}</p>
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
                  <a href="/watchings/{{ $watching->id }}/edit" class="text-(--text-white) bg-(--good-green) px-2 mt-1 cursor-pointer">Edit</a>
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
      <h2 class="text-2xl text-(--logo-blue) font-bold">Mangas</h2>
      <div class="flex flex-col gap-4">
        @php $x = 0; @endphp
        @foreach($readings as $reading)
          @php 
            $manga = $reading->manga;
            $x += 1;
          @endphp
          <div class="flex gap-2">
            <div>
            <p>#{{ $x }}</p>
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
                <a href="/readings/{{ $reading->id }}" class="text-(--good-green) cursor-pointer">Edit</a>
                <form action="/readings/{{ $reading->id }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="text-(--bad-red) cursor-pointer">Remove</button>
                </form>
              </div>
            </div>
          </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</x-layout.layout>