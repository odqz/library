<div class="navbar">
  <div class="left">
    <a href="/" class="title">
      <img src="{{asset('favicon.ico')}}" alt="Site logo">
      <h1>Library</h1>
    </a>
    <a href="">anime</a>
    <p>|</p>
    <a href="">manga</a>
    <p>|</p>
    <a href="">community</a>
    @if(Auth::check())
      <p>|</p>
      <a href="/users/">my shelf</a>
    @endif
  </div>
  <div class="right">
    @if(Auth::check())
      <a href="/users/{{Auth::user()->id}}">{{Auth::user()->name}}</a>
      <p>|</p>
      <form action="/logout" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">logout</button>
      </form>
    @else
      <a href="/login">login</a>
      <p>|</p>
      <a href="/register">register</a>
    @endif
  </div>
</div>