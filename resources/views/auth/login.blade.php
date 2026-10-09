<x-layout.layout title="Login">
  <div class="flex flex-col gap-6">
    <!-- Login section -->
    <form action="{{ route('login') }}" method="post" class="flex flex-col items-start gap-2">
      @csrf
      <div class="grid grid-cols-[80px_1fr] gap-2">
        <x-form.field name="username" label="Username" type="text" max="255" placeholder="somebody42" required></x-form.field>
      </div>
      <div class="grid grid-cols-[80px_1fr] gap-2">
        <x-form.field name="password" label="Password" type="password" min="8" max="255" min="8" placeholder="**********" required></x-form.field>
      </div>
      <button class="bg-(--logo-blue) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Login</button>
    </form>

    <!-- Account creation section -->
    <form action="{{ route('create-account') }}" method="post" class="flex flex-col items-start gap-2">
      @csrf
      <div class="grid grid-cols-[80px_1fr] gap-2">
        <x-form.field name="username" label="Username" type="text" max="255" placeholder="somebody42" required></x-form.field>
      </div>
      <div class="grid grid-cols-[80px_1fr] gap-2">
        <x-form.field name="password" label="Password" type="password" min="8" max="255" placeholder="**********" required></x-form.field>
      </div>
      <button class="bg-(--good-green) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Create account</button>
    </form>

    <!-- Error display -->
    <div>
      @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="error text-red-500">{{$error}}</p>
        @endforeach
      @endif
    </div>
  </div>
</x-layout.layout>