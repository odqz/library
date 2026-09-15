<x-layout.layout>
  <div class="flex gap-2">
    <div class="shrink-0">
      <img src="{{ $anime->cover_image_path }}" alt="" class="w-75 h-105">
    </div>
    <form action="/watchings/{{ $watching->id }}" method="post" class="flex flex-col items-start gap-2">
      @csrf
      @method('PATCH')
      <div>
        <h2 class="text-2xl text-(--logo-blue) font-bold w-75">{{ $anime->title_english }}</h2>
      </div>
      <div class="flex gap-2">
        <label for="episodes">Episodes</label>
        <input id="episodes" name="episodes" type="number" value="{{ $watching->episodes_watched }}" class="text-[#4d4d4d] outline-none px-1 border">
      </div>
      <div class="flex gap-2">
        <label for="status">Status:</label>
        <select name="status" id="status" class="text-[#4d4d4d] outline-none px-1 border">
          <option value="Planned" {{ $watching->status == "Planned" ? "selected" : "" }}>Planned</option>
          <option value="Watching" {{ $watching->status == "Watching" ? "selected" : "" }}>Watching</option>
          <option value="Completed" {{ $watching->status == "Completed" ? "selected" : "" }}>Completed</option>
          <option value="Dropped" {{ $watching->status == "Dropped" ? "selected" : "" }}>Dropped</option>
        </select>
      </div>
       <div class="flex gap-2">
        <label for="score">Score</label>
        <input id="score" name="score" type="number" value="{{ $watching->score }}" class="text-[#4d4d4d] outline-none px-1 border">
      </div>
      <div class="flex gap-2">
        <label for="notes">Notes: </label>
        <textarea name="notes" id="notes" class="text-[#4d4d4d] outline-none px-1 border">{{ $watching->notes }}</textarea>
      </div>
      <button class="bg-(--good-green) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Edit</button>
      <button class="bg-(--bad-red) mt-1 py-0.5 px-4 text-(--text-bright-white) hover:brightness-[94%]" type="submit" form="delete-reading">Remove</button>
    </form>
    <form action="/watchings/{{ $watching->id }}" method="post" id="delete-reading">
      @csrf
      @method('DELETE')
    </form>
  </div>
</x-layout.layout>