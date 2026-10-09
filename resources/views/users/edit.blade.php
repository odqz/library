@vite(['resources/js/change-password.js'])

<x-layout.layout title="{{ $user->username }}">
  <div class="flex flex-col gap-1">
    <!-- Basic user information -->
    <div>
      <span class="text-[#4a4a4a]">username: </span>
      <span class="text-(--logo-blue) font-bold">{{ $user->username }}</span>
    </div>
    <div>
      <span class="text-[#4a4a4a]">created: </span>
      <span class="text-(--logo-blue) font-bold">{{ $user->created_at->format('d/m/y') }}</span>
    </div>

    <!-- Change password section -->
    <form action="{{ route('users.update', ['user' => $user]) }}" method="post" class="flex flex-col items-start gap-1 px-2 py-1 border w-fit">
      <button id="change-password-btn" class="cursor-pointer text-(--logo-blue) font-bold" type="button">Change password</button>
      @csrf
      @method('PATCH')
      <div class="item flex hidden flex-col">
        <x-form.field name="current_password" label="Current password" type="password" min="8" max="255" placeholder="**********" required></x-form.field>
      </div>
      <div class="item flex hidden  flex-col">
        <x-form.field name="new_password" label="New password" type="password" min="8" max="255" placeholder="**********" required></x-form.field>
      </div>
      <div class="item flex hidden flex-col">
        <x-form.field name="password_confirmation" label="Confirm password" type="password" min="8" max="255" placeholder="**********" required></x-form.field>
      </div>
      <div class="item hidden">
        <button class="bg-(--good-green) my-1 py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Change password</button>
      </div>
    </form>

    <!-- Delte account section -->
    <form action="{{ route('users.delete', ['user' => $user]) }}" method="post" class="my-2">
      @csrf
      @method('DELETE')
      <button class="bg-(--bad-red) py-0.5 px-3 text-(--text-bright-white) hover:brightness-[94%]" type="submit">Delete account</button>
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