<x-layout.layout>
  @php $x = 1; @endphp
  <div class="flex flex-col gap-4"> 
    @foreach($mangas as $manga)
      <div class="flex gap-2">
        <div>
          <p>#{{ $x }}</p>
        </div>
        <div class="flex">
          <img src="{{ $manga["coverImage"]["medium"] }}" 
            alt="{{ $manga["title"]["english"] }} cover image"
            class="w-20 h-28">
        </div>
        <div class="flex flex-col">
          @if($manga["title"]["english"] != NULL)
            <a href="/mangas/{{$manga["id"]}}" class="text-xl text-(--logo-blue) font-bold">{{ $manga["title"]["english"] }}</a>
          @else
            <a href="/mangas/{{$manga["id"]}}" class="text-xl text-(--logo-blue) font-bold">{{ $manga["title"]["romaji"] }}</a>
          @endif
          <p class="text-[#505050]">Score: {{ $manga["averageScore"] }}/100</p>
          <p class="text-[#505050]">Status: {{ $manga["status"] }}</p>
          <div class="flex gap-1">
            @foreach($manga["genres"] as $genre)
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