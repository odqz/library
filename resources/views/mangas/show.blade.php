<x-layout.layout>
  <div class="flex gap-4">
    <div class="shrink-0">
      <img src="{{ $manga["coverImage"]["extraLarge"] }}" alt="" class="w-75 h-105">
    </div>
    <div class="flex flex-col gap-2">
      <h2 class="text-4xl text-(--logo-blue) font-bold">{{ $manga["title"]["english"] }}</h2>
      <p>{{ $manga["description"] }}</p>
      <table class="min-w-full divide-y border">
        <thead>
          <tr class="flex justify-between">
            <th class="p-1 text-start text-xs">VOLUMES</th>
            <th class="p-1 text-start text-xs">CHAPTERS</th>
            <th class="p-1 text-start text-xs">STATUS</th>
            <th class="p-1 text-start text-xs">SCORE</th>
            <th class="p-1 text-start text-xs">FAVOURITES</th>
            <th class="p-1 text-start text-xs">POPULARITY</th>
            <th class="p-1 text-start text-xs">COUNTRY</th>
          </tr>
        </thead>
        <tbody>
          <tr class="flex justify-between">
            <td class="p-1 text-sm">@if($manga["volumes"] == NULL) null @else $manga["volumes"] @endif</td>
            <td class="p-1 text-sm">@if($manga["chapters"] == NULL) null @else $manga["chapters"] @endif</td>
            <td class="p-1 text-sm">{{ $manga["status"] }}</td>
            <td class="p-1 text-sm">{{ $manga["averageScore"] }}</td>
            <td class="p-1 text-sm">{{ $manga["favourites"] }}</td>
            <td class="p-1 text-sm">{{ $manga["popularity"] }}</td>
            <td class="p-1 text-sm">{{ $manga["countryOfOrigin"] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</x-layout.layout>