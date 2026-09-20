<x-layout.layout>
  @php $x = 1; @endphp
  <div class="flex flex-col gap-2 w-full">
    <form action="/find/anime" method="get" class="flex gap-2">
      <input type="search" name="search" id="search" class="w-[50%] border px-1 outline-none" placeholder="Find an anime...">
      <label for="search" hidden>Search</label>
      <button type="submit" class="bg-(--logo-blue) text-(--text-white) py-0.5 px-2">search</button>
    </form>
    @foreach($animes as $anime)
      <div class="flex gap-2">
        <div>
          <p>#{{ $x = $x < 10 ? "0$x" : "$x" }}</p>
        </div>
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
          <p class="text-[#505050]">Score: {{ $anime->average_score }}/100</p>
          <p class="text-[#505050]">Status: {{ $anime->status }}</p>
          <div class="flex gap-1">
            @foreach($anime->genres as $genre)
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
</x-layout.layout>