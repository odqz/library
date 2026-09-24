<x-layout.layout>
  @php $x = ($page_number * 30) - 29; @endphp
  <div class="flex flex-col gap-2 w-full "> 
    <form action="/mangas/index/{{ $page_number }}" method="get" class="flex gap-2 w-[30%]">
      <input type="search" name="search" id="search" class="w-full border px-1 outline-none" placeholder="Find a manga...">
      <label for="search" hidden>Search</label>
      <button type="submit" class="bg-(--logo-blue) text-(--text-white) py-0.5 px-2">search</button>
    </form>
    @foreach($mangas as $manga)
      <div class="flex gap-2">
        <div>
          <p>#{{ $x = $x < 10 ? "0$x" : "$x" }}</p>
        </div>
        <div class="flex">
          <img src="{{ $manga->cover_image_path }}" 
            alt="{{ $manga->title_english }} cover image"
            class="w-20 h-28">
        </div>
        <div class="flex flex-col">
          @if($manga->title_english != NULL)
            <a href="/mangas/{{$manga->id}}" class="text-xl text-(--logo-blue) font-bold">{{ $manga->title_english }}</a>
          @else
            <a href="/mangas/{{$manga->id}}" class="text-xl text-(--logo-blue) font-bold">{{ $manga->title_romaji }}</a>
          @endif
          <p class="text-[#505050]">Score: {{ $manga->average_score }}/100</p>
          <p class="text-[#505050]">Status: {{ $manga->status }}</p>
          <div class="flex gap-1">
            @foreach($manga->genres as $genre)
              @if($genre == "Action")
                <div class="bg-(--bad-red) text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Adventure")
                <div class="bg-(--good-green) text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Drama")
                <div class="bg-(--logo-blue) text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Fantasy")
                <div class="bg-[#00a080] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Horror")
                <div class="bg-[#1e1e1e] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Psychological")
                <div class="bg-[#823400] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Mystery")
                <div class="bg-[#b59d01] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Supernatural")
                <div class="bg-[#820082] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Comedy")
                <div class="bg-[#0bba7c] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Thriller")
                <div class="bg-[#420468] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Sports")
                <div class="bg-[#65ba0b] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Sci-Fi")
                <div class="bg-[#a30000] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Slice of Life")
                <div class="bg-[#b707ab] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @elseif($genre == "Romance")
                <div class="bg-[#840727] text-(--text-bright-white) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @else
                <div class="text-(--logo-blue) py-0.5 px-1 text-sm">{{ $genre }}</div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
      @php $x += 1; @endphp
    @endforeach
  </div>
  <div class="flex justify-center gap-2">
    @if($page_number > 1)
      <form action="/mangas/index/{{ $page_number-1 }}" method="get">
        @csrf
        <input type="number" name="page" value="{{ $page_number-1 }}" hidden>
        <button class="bg-(--logo-blue) text-(--text-bright-white) py-0.5 px-2">< prev</button>
      </form>
    @endif
    <form action="/mangas/index/{{ $page_number+1 }}" method="get">
      @csrf
      <input type="number" name="page" value="{{ $page_number+1 }}" hidden>
      <button class="bg-(--logo-blue) text-(--text-bright-white) py-0.5 px-2">next ></button>
    </form>
  </div>
</x-layout.layout>