@props(['rank', 'title', 'average_score', 'status', 'cover_image_path', 'url'])

<div class="flex gap-2">
  <div>
    <p>#{{ $rank = $rank < 10 ? "0$rank" : "$rank" }}</p>
  </div>
  <div class="flex">
    <img src="{{ $cover_image_path }}" 
      alt="{{ $title }} cover image"
      class="w-20 h-28">
  </div>
  <div class="flex flex-col">
    <a href="{{ $url }}" class="text-xl text-(--logo-blue) font-bold">{!! $title !!}</a>
    <p class="text-[#505050]">Score: {{ $average_score }}/100</p>
    <p class="text-[#505050]">Status: {{ $status }}</p>
    <div class="flex gap-1">
      {{ $slot }}
    </div>
  </div>
</div>