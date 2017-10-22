@extends('layouts.app_admin')
@section('content')
<form action"finduser" method="post">
    {{ csrf_field() }}
    
    <div class="col-md-8 col-md-offset-2">
        
         <div class="form-group">
            <label for="search">Search</label>
            <input type="text" class="form-control" id="user"name="email" placeholder="Email@example.com">
         </div>
    <div class="form-group">
        <p class="help-block">Click on search to look up a User</p>
    </div>
        <button type="submit" class="btn btn-info">Search</button>
</form>
        
    </div>
@endsection
