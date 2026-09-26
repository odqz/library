<x-layout.layout>
  <div class="flex gap-2">
    <div class="shrink-0">
      <img src="{{ $media->cover_image_path }}" alt="" class="w-75 h-105">
    </div>
    <form action="/{{ $type }}s/{{ $consumption->id }}" method="post" class="flex flex-col items-start gap-1">
      @csrf
      @method('PATCH')
      <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $media->title_english }}</h2>
      @if($type == 'reading')
        <div class="flex flex-col">
          <x-form.field name="volumes" label="Volumes" type="number" min="0" value="{{ $consumption->volumes_read }}"></x-form.field>
        </div>
        <div class="flex flex-col">
          <x-form.field name="chapters" label="Chapters" type="number" min="0" value="{{ $consumption->chapters_read }}"></x-form.field>
        </div>
      @elseif($media->episodes > 1)
        <div class="flex flex-col">
          <x-form.field name="episodes" label="Episodes" type="number" min="0" value="{{ $consumption->episodes_watched }}"></x-form.field>
        </div>
      @endif
      <div class="flex flex-col">
        <label for="status">Status:</label>
        <select name="status" id="status" class="text-[#4d4d4d] outline-none px-1 border">
          <option value="Planned" {{ $consumption->status == "Planned" ? "selected" : "" }}>Planned</option>
          <option value="Watching" {{ $consumption->status == "Watching" ? "selected" : "" }}>Watching</option>
          <option value="Completed" {{ $consumption->status == "Completed" ? "selected" : "" }}>Completed</option>
          <option value="Paused" {{ $consumption->status == "Paused" ? "selected" : "" }}>Paused</option>
          <option value="Dropped" {{ $consumption->status == "Dropped" ? "selected" : "" }}>Dropped</option>
        </select>
      </div>
      <div class="flex flex-col">
        <x-form.field name="score" label="Score" type="number" min="0" max="100" value="{{ $consumption->score }}"></x-form.field>
      </div>
      <div class="flex flex-col">
        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" cols="24" rows="3" class="text-[#4d4d4d] outline-none px-1 border">{{ $consumption->notes }}</textarea>
      </div>
      <button class="bg-(--good-green) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Edit</button>
      <button class="bg-(--bad-red) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit" form="delete-consumption">Remove</button>
    </form>
    <form action="/{{ $type }}s/{{ $consumption->id }}" method="post" id="delete-consumption">
      @csrf
      @method('DELETE')
    </form>
  </div>
</x-layout.layout>