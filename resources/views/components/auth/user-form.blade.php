@props(['action', 'button'])

<form action="{{ $action }}" method="post" class="flex flex-col gap-4 m-16 px-16 py-8 shadow-[1px_1px_4px_gray] bg-[#e9e9e9]">
  @csrf
  <x-auth.field name="username" max="255" placeholder="Somebody42" required></x-auth.field>
  <x-auth.field name="password" type="password" min="8" max="255" placeholder="************" required></x-auth.field>
  <div class="action"><button class="rounded bg-[#0463BD] font-bold text-[#e7e7e7] px-3 py-1 hover:brightness-[92%]" type="submit">{{ $button }}</button></div>
</form>