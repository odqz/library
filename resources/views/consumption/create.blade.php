<x-layout.layout>
  <div class="flex gap-2">
    <div class="shrink-0">
      <img src="{{ $media->cover_image_path }}" alt="" class="w-75 h-105">
    </div>
    @if($type == 'manga')
      <form action="/readings/{{ $media->id }}" method="post" class="flex flex-col items-start gap-1">
    @else
      <form action="/watchings/{{ $media->id }}" method="post" class="flex flex-col items-start gap-1">
    @endif
      @csrf
      <a href="/{{ $type }}s/{{ $media->id }}" class="text-2xl text-(--logo-blue) font-bold w-75">{{ $media->title_english }}</a>
      @if($type == 'manga')
        <div class="flex flex-col">
          <x-form.field name="volumes" label="Volumes" type="number" min="0" placeholder="{{ $media->volumes }}"></x-form.field>
        </div>
        <div class="flex flex-col">
          <x-form.field name="chapters" label="Chapters" type="number" min="0" placeholder="{{ $media->chapters }}"></x-form.field>
        </div>
      @elseif($media->episodes > 1)
        <div class="flex flex-col">
          <x-form.field name="episodes" label="Episodes" type="number" min="0" placeholder="{{ $media->episodes }}"></x-form.field>
        </div>
      @endif
      <div class="flex flex-col">
        <label for="status">Status:</label>
        <select name="status" id="status" class="text-[#4d4d4d] outline-none px-1 border">
          <option value="Planned">Planned</option>
          <option value="Watching">Watching</option>
          <option value="Completed">Completed</option>
          <option value="Paused">Paused</option>
          <option value="Dropped">Dropped</option>
        </select>
      </div>
      <div class="flex flex-col">
        <x-form.field name="score" label="Score" type="number" min="0" max="100" placeholder="{{ $media->average_score }}"></x-form.field>
      </div>
      <div class="flex flex-col">
        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" cols="24" rows="3" class="text-[#4d4d4d] outline-none px-1 border" placeholder="I think that..."></textarea>
      </div>
      <button class="bg-(--good-green) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Add</button>
    </form>
  </div>
</x-layout.layout>