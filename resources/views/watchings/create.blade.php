<x-layout.layout>
  <div class="flex gap-2">
    <div class="shrink-0">
      <img src="{{ $anime->cover_image_path }}" alt="" class="w-75 h-105">
    </div>
    <form action="/watchings/{{ $anime->id }}" method="post" class="flex flex-col items-start gap-2">
      @csrf
      <div>
        <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $anime->title_english }}</h2>
      </div>
      <x-auth.field name="episodes" type="number" min="0" placeholder="0 / {{ $anime->episodes }}"></x-auth.field>
      <div class="flex gap-2">
        <label for="status">status:</label>
        <select name="status" id="status" class="text-[#4d4d4d] outline-none px-1 border">
          <option value="Planned" default>Planned</option>
          <option value="Watching">Watching</option>
          <option value="Completed">Completed</option>
          <option value="Dropped">Dropped</option>
        </select>
      </div>
      <x-auth.field name="score" type="number" min="0" max="100" placeholder="0" ></x-auth.field>
      <div class="flex gap-2">
        <label for="notes">Notes: </label>
        <textarea name="notes" id="notes" class="text-[#4d4d4d] outline-none px-1 border" placeholder="Yo it was hype..."></textarea>
      </div>
      <button class="bg-(--good-green) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Add</button>
    </form>
  </div>
</x-layout.layout>