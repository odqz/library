<div class="flex items-center justify-between w-[80%] bg-(--dark-blue) mt-2 text-(--text-white) py-0.5 px-1 pr-2 text-sm">
  <div class="flex items-end gap-1">
    @if(Auth::check())
      <a href="{{ route('users.show', ['user' => Auth::user()]) }}" class="flex">
    @else
      <a href="{{ route('login') }}" class="flex">
    @endif
      <img src="{{ asset('logo.png') }}" alt="Site logo" class="w-8">
      <h1 class="text-[#e9e9e9] font-bold">Library</h1>
    </a>
    </a>
    <div class="flex">
      <a href="{{ route('animes.index', ['page' => 1]) }}">anime</a>
      <p>|</p>
      <a href="{{ route('mangas.index', ['page' => 1]) }}">manga</a>
    </div>
  </div>
  <div class="flex item-center">
    @if(Auth::check())
      <a href="{{ route('users.edit', ['user' => Auth::user()]) }}">{{Auth::user()->username}}</a>
      <p>|</p>
      <form action="{{ route('logout') }}" method="post">
        @csrf
        @method('DELETE')
        <button class="hover:cursor-pointer" type="submit">logout</button>
      </form>
    @else
      <a href="{{ route('login') }}">login</a>
    @endif
  </div>
</div>