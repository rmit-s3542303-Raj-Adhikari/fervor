
@extends('layouts.app')
@section('content')
<div class="container">
     <h1>Admin User View</h1>
</div>
{{-- Display all users sorted by Flagged desc --}}
@foreach($user as $object)

<div class="container">
    <div class="row">
      <div class="col-md-10"><b>{{$object->firstname}} {{$object->lastname}}</b></div>
      <label class="name"><b></b></label>
           <div class="panel-body">
            <img src="/img/avatar/{{ $object->avatar}}" 
            style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
         
          <div class="col-sm-4"> 
              <p class="Email">{{$object->email}}</p>
              <p class="DOB">{{$object->dob}}</p></div>
                <p class="Gender"><b>Gender:</b>{{$object->gender}}</p>
               <p class="Preference"><b>Preference:</b>{{$object->preference}}</p>

          <div class="col-sm-4">
                  <div class="col-xs-3">
                       <p class="Login status"><b>Status:</b>{{$object->status}}</p>
                       <p class="Verification"><b>Verified:</b>{{$object->firstLogin}}</p>
                        {{-- Admin action for flagging a user --}}
                         <div class="col-xs-3">
                            
                            
                            <label>Flag User</label>
                             @if ($object->flagged != 1)
                              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                              @else
                              <span class="glyphicon glyphicon-star" </span>
                                  @endif
                                  
                        <form action="flaguser" method="post">
                         {{ csrf_field() }}
                        <div class="d-inline"> 
                        <button id="flag" type="submit" class="d-inline btn btn-warning">Flag User</button>
                         </div>
       
                         
                         <input type="hidden" class="form-control" id="user"name="email" value={{$object->email}}>
                        </form>
                         
        
                        <button id="delete" type="submit"  action="deleteuser" method="post" class=" btn btn-danger" >Ban User</button>
                        </div>
                      
                        <button id="view" type="button" href="{{ url('/profile') }}" class="d-inline btn btn-primary">View User</button>
                       </div>
                       </div>
                    </div>
                </div>
        </div>
</div>
        @endforeach
@endsection