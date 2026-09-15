<x-layout.layout>
  <div class="flex gap-2">
    <div class="shrink-0">
      <img src="{{ $manga->cover_image_path }}" alt="" class="w-75 h-105">
    </div>
    <form action="/readings/{{ $manga->id }}" method="post" class="flex flex-col items-start gap-2">
      @csrf
      <div>
        <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $manga->title_english }}</h2>
      </div>
      <x-auth.field name="volumes" type="number" min="0" placeholder="0 / {{ $manga->volumes }}"></x-auth.field>
      <x-auth.field name="chapters" type="number" min="0" placeholder="0 / {{ $manga->chapters }}"></x-auth.field>
      <div class="flex gap-2">
        <label for="status">status:</label>
        <select name="status" id="status" class="text-[#4d4d4d] outline-none px-1 border">
          <option value="Planned">Planned</option>
          <option value="Reading">Reading</option>
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