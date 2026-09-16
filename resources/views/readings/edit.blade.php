<x-layout.layout>
  <div class="flex gap-2">
    <div class="shrink-0">
      <img src="{{ $manga->cover_image_path }}" alt="" class="w-75 h-105">
    </div>
    <form action="/readings/{{ $reading->id }}" method="post" class="flex flex-col items-start gap-1">
      @csrf
      @method('PATCH')
      <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $manga->title_english }}</h2>
      <div class="flex flex-col">
        <x-form.field name="volumes" label="Volumes" type="number" min="0" value="{{ $reading->volumes_read }}"></x-form.field>
      </div>
      <div class="flex flex-col">
        <x-form.field name="chapters" label="Chapters" type="number" min="0" value="{{ $reading->chapters_read }}"></x-form.field>
      </div>
      <div class="flex flex-col">
        <label for="status">Status:</label>
        <select name="status" id="status" class="text-[#4d4d4d] outline-none px-1 border">
          <option value="Planned" {{ $reading->status == "Planned" ? "selected" : "" }}>Planned</option>
          <option value="Watching" {{ $reading->status == "Watching" ? "selected" : "" }}>Watching</option>
          <option value="Completed" {{ $reading->status == "Completed" ? "selected" : "" }}>Completed</option>
          <option value="Paused" {{ $reading->status == "Paused" ? "selected" : "" }}>Paused</option>
          <option value="Dropped" {{ $reading->status == "Dropped" ? "selected" : "" }}>Dropped</option>
        </select>
      </div>
      <div class="flex flex-col">
        <x-form.field name="score" label="Score" type="number" min="0" max="100" value="{{ $reading->score }}"></x-form.field>
      </div>
      <div class="flex flex-col">
        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" cols="24" rows="3" class="text-[#4d4d4d] outline-none px-1 border">{{ $reading->notes }}</textarea>
      </div>
      <button class="bg-(--good-green) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Edit</button>
      <button class="bg-(--bad-red) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit" form="delete-reading">Remove</button>
    </form>
    <form action="/readings/{{ $reading->id }}" method="post" id="delete-reading">
      @csrf
      @method('DELETE')
    </form>
  </div>
</x-layout.layout>