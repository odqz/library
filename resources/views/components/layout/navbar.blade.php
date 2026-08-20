<div class="navbar">
  <div class="left">
    <a href="" class="title">
      <img src="{{asset('favicon.ico')}}" alt="Site logo">
      <h1>Library</h1>
    </a>
    <a href="">anime</a>
    <p>|</p>
    <a href="">manga</a>
    <p>|</p>
    <a href="">community</a>
    <p>|</p>
    <a href="">help</a>
    <p>|</p>
    <a href="">search</a>
  </div>
  <div class="right">
    @if(Auth::check())
      <a href="">profile</a>
      <p>|</p>
      <a href="">account</a>
      <p>|</p>
      <a href="">logout</a>
    @else
      <a href="/login">login</a>
      <p>|</p>
      <a href="/register">register</a>
    @endif
  </div>
</div>