<x-layout>
  <form action="/login" method="post" class="login">
    @csrf
    <div class="fields">
      <div class="field">
        <label for="email">Email</label>
        <input  id="email" type="email" name="email" max="255" placeholder="johndoe@example.com" required>
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" min="8" max="255" placeholder="**************" required>
      </div>
    </div>
    <div class="action">
      <button type="submit">Log In</button>
    </div>
  </form>
</x-layout>