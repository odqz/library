<div class="flex items-center justify-between w-[80%] bg-(--dark-blue) mt-2 text-(--text-white) py-0.5 px-1 pr-2 text-sm">
  <div class="flex items-end gap-1">
    @if(Auth::check())
      <a href="/users/{{ Auth::user()->id }}" class="flex">
    @else
      <a href="/login" class="flex">
    @endif
      <img src="{{asset('logo.png')}}" alt="Site logo" class="w-8">
      <h1 class="text-[#e9e9e9] font-bold">Library</h1>
    </a>
    </a>
    <div class="flex">
      <a href="/animes/">anime</a>
      <p>|</p>
      <a href="/mangas/">manga</a>
    </div>
  </div>
  <div class="flex item-center">
    @if(Auth::check())
      <a href="/users/{{Auth::user()->id}}/edit">{{Auth::user()->username}}</a>
      <p>|</p>
      <form action="/logout" method="post">
        @csrf
        @method('DELETE')
        <button class="hover:cursor-pointer" type="submit">logout</button>
      </form>
    @else
      <a href="/login">login</a>
    @endif
  </div>
</div>