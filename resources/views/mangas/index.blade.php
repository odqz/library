
<x-layout.layout>
  <div class="flex flex-col gap-4">
    @foreach($mangas as $manga)
      <div class="border p-1">
        <img 
          src="{{ $manga["coverImage"]["medium"] }}" 
          alt="{{ $manga["title"]["english"] }} cover image"
          class="w-16">
        <p>{{ $manga["title"]["english"] }}</p>
      </div>
    @endforeach
  </div>
</x-layout.layout>