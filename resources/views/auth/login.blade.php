<x-layout.layout>
  <div class="flex flex-col gap-6">
    <form action="/login" method="post" class="flex flex-col items-start gap-2">
      @csrf
      <x-auth.field name="username" max="255" placeholder="Somebody42" required></x-auth.field>
      <x-auth.field name="password" type="password" min="8" max="255" placeholder="************" required></x-auth.field>
      <button class="bg-(--logo-blue) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Log in</button>
    </form>
    <form action="/create-account" method="post" class="flex flex-col items-start gap-2">
      @csrf
      <x-auth.field name="username" max="255" placeholder="Somebody42" required></x-auth.field>
      <x-auth.field name="password" type="password" min="8" max="255" placeholder="************" required></x-auth.field>
      <button class="bg-(--good-green) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Create account</button>
    </form>
  </div>
</x-layout.layout>