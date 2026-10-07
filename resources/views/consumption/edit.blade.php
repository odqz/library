<x-layout.layout title="{{ $type == 'watching' ? 'Watching' : 'Reading' }}">
  <div class="flex gap-2">
    <div class="shrink-0">
      <img src="{{ $media->cover_image_path }}" alt="" class="w-75 h-105">
    </div>
    <form 
      action="{{ $type == 'watching' ? route('watchings.edit', ['watching' => $consumption]) : route('readings.edit', ['reading' => $consumption]) }}" 
      method="post" 
      class="flex flex-col items-start gap-1"
    >
      @csrf
      @method('PATCH')
      <a href="{{ $type == 'watching' ? route('animes.show', ['anime' => $media]) : route('mangas.show', ['manga' => $media]) }}" class="text-2xl text-(--logo-blue) font-bold w-75">
        {{ $media->title_english }}
      </a>
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
          <option value="PLANNED" {{ $consumption->status == "PLANNED" ? 'selected' : '' }}>PLANNED</option>
          <option value="{{ $status = $type == 'watching' ? 'WATCHING' : 'READING' }}" {{ $consumption->status == "WATCHING" ? 'selected' : '' }}>{{ $status }}</option>
          <option value="COMPLETED" {{ $consumption->status == "COMPLETED" ? 'selected' : '' }}>COMPLETED</option>
          <option value="PAUSED" {{ $consumption->status == "PAUSED" ? 'selected' : '' }}>PAUSED</option>
          <option value="DROPPED" {{ $consumption->status == "DROPPED" ? 'selected' : '' }}>DROPPED</option>
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
    <form 
      action="{{ $type == 'watching' ? route('watchings.delete', ['watching' => $consumption]) : route('readings.delete', ['reading' => $consumption]) }}" 
      method="post" 
      id="delete-consumption"
    >
      @csrf
      @method('DELETE')
    </form>
  </div>
</x-layout.layout>