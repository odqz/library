<x-layout.layout>
  <div class="account-info">
    <div class="account-name">Username: {{ $user->username }}</div>
    <div class="account-created">Joined {{ $user->created_at }}</div>

    <form action="" method="post">
      <div class="field">
        <label for="">Current password</label>
        <input type="text">
      </div>
        
      <div class="field">
        <label for="">New password</label>
        <input type="text">
      </div>

      <div class="field">
        <label for="">Confirm new password</label>
        <input type="text">
      </div>

      <div class="action">
        <button type="submit">Change password</button>
      </div>
    </form>

    <form action="" method="post">
      <div class="action">
        <button type="submit">Delete account</button>
      </div>
    </form>
    
  </div>
</x-layout.layout>