<x-layout>
    <form action="/register" method="post">
        <div class="field">
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" max="255" required>
        </div>
        <div class="field">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" max="255" required>
        </div>
        <div class="field">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" min="8" max="255" required>
        </div>
        <div class="actions">
            <button type="submit">Sign Up</button>
        </div>
    </form>
</x-layout>