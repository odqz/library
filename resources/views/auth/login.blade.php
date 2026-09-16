<x-layout.layout>
  <div class="flex flex-col gap-6">
    <form action="/login" method="post" class="flex flex-col items-start gap-2">
      @csrf
      <div class="grid grid-cols-[80px_1fr] gap-2">
        <x-form.field name="username" label="Username" type="text" max="255" placeholder="somebody42" required></x-form.field>
      </div>
      <div class="grid grid-cols-[80px_1fr] gap-2">
        <x-form.field name="password" label="Password" type="password" max="255" min="8" placeholder="**********" required></x-form.field>
      </div>
      <button class="bg-(--logo-blue) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Login</button>
    </form>
    <form action="/create-account" method="post" class="flex flex-col items-start gap-2">
      @csrf
      <div class="grid grid-cols-[80px_1fr] gap-2">
        <x-form.field name="username" label="Username" type="text" max="255" placeholder="somebody42" required></x-form.field>
      </div>
      <div class="grid grid-cols-[80px_1fr] gap-2">
        <x-form.field name="password" label="Password" type="password" max="255" min="8" placeholder="**********" required></x-form.field>
      </div>
      <button class="bg-(--good-green) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Create account</button>
    </form>
  </div>
</x-layout.layout>