<x-layout.layout>
  <div class="flex gap-2">
    <div class="shrink-0">
      <img src="{{ $anime->cover_image_path }}" alt="" class="w-75 h-105">
    </div>
    <form action="/watchings/{{ $anime->id }}" method="post" class="flex flex-col items-start gap-1">
      @csrf
      <a href="/animes/{{ $anime->id }}" class="text-2xl text-(--logo-blue) font-bold w-75">{{ $anime->title_english }}</a>
      @if($anime->episodes > 1)
        <div class="flex flex-col">
          <x-form.field name="episodes" label="Episodes" type="number" min="0" placeholder="{{ $anime->episodes }}"></x-form.field>
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
        <x-form.field name="score" label="Score" type="number" min="0" max="100" placeholder="{{ $anime->average_score }}"></x-form.field>
      </div>
      <div class="flex flex-col">
        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" cols="24" rows="3" class="text-[#4d4d4d] outline-none px-1 border" placeholder="I think that..."></textarea>
      </div>
      <button class="bg-(--good-green) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Add</button>
    </form>
  </div>
</x-layout.layout>