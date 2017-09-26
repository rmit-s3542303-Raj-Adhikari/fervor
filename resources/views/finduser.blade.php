
<form action"searchuser" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="search">Search</label>
        <input type="text" class="form-control" id="user"name="email" placeholder="Email@example.com">
  </div>
    <div class="form-group">
    <p class="help-block">Click on search to look for the User</p>
  </div>
  <button type="submit" class="btn btn-default">Search</button>
</form>
