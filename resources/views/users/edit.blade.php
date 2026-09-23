@vite(['resources/js/change-password.js'])

<x-layout.layout>
  <div class="flex flex-col gap-1">
    <div>
      <span class="text-[#4a4a4a]">username: </span>
      <span class="text-(--logo-blue) font-bold">{{ $user->username }}</span>
    </div>
    <div>
      <span class="text-[#4a4a4a]">created: </span>
      <span class="text-(--logo-blue) font-bold">{{ $user->created_at->format('d/m/y') }}</span>
    </div>
    <form action="/users/{{ $user->id }}" method="post" class="flex flex-col items-start gap-1 p-2 border w-min">
      <button id="change-password-btn" class="cursor-pointer w-[100%] flex-wrap-0" type="button">Change password</button>
      @csrf
      @method('PATCH')
      <div class="item hidden flex flex-col">
        <x-form.field name="current-password" label="Current password" type="password" min="8" max="255" placeholder="**********" required></x-form.field>
      </div>
      <div class="item hidden flex flex-col">
        <x-form.field name="new-password" label="New password" type="password" min="8" max="255" placeholder="**********" required></x-form.field>
      </div>
      <div class="item hidden flex flex-col">
        <x-form.field name="confirm-new-password" label="Confirm password" type="password" min="8" max="255" placeholder="**********" required></x-form.field>
      </div>
      <div class="item hidden">
        <button class="bg-(--good-green) mt-1 py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Change password</button>
      </div>
    </form>
    <form action="/delete-account" method="post" class="my-2">
      @csrf
      @method('DELETE')
      <button class="bg-(--bad-red) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Delete account</button>
    </form>
  </div>
</x-layout.layout>