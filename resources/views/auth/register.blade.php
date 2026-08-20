<x-layout.layout>
  <form action="/register" method="post" class="register">
    <div class="fields">
      <div class="field">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" max="255" placeholder="John Doe" required>
      </div>
      <div class="field">
        <label for="email">
          Email
        </label>
        <input id="email" type="email" name="email" max="255" placeholder="johndoe@example.com" required>
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" min="8" max="255" placeholder="**************" required>
      </div>
    </div>
    <div class="action">
      <button type="submit">Create account</button>
    </div>
  </form>
</x-layout.layout>
