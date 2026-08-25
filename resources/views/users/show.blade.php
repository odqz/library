@vite(['resources/js/change-password.js']);

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
    <div>
      <button id="change-password-btn" class="underline cursor-pointer">Change password</button>
    </div>
    <form action="/update" method="post" class="hidden flex-col items-start gap-2 p-2 border" id="change-password-form">
      <x-auth.field label="Current password" name="current-password" type="password" min="8" max="255" placeholder="************" required></x-auth.field>
      <x-auth.field label="New password" name="new-password" type="password" min="8" max="255" placeholder="************" required></x-auth.field>
      <x-auth.field label="Confirm password" name="confirm-password" type="password" min="8" max="255" placeholder="************" required></x-auth.field>
      <button class="bg-(--good-green) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Change password</button>
    </form>
    <form action="/delete-account" method="post" class="my-2">
      @csrf
      @method('DELETE')
      <button class="bg-(--bad-red) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Delete account</button>
    </form>
  </div>
</x-layout.layout>