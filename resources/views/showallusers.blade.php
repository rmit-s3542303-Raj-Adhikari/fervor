@extends('layouts.app_admin')
@section('content')
    <div class="container">
        <h1>Admin User View</h1>
    </div>
    {{-- Display all users sorted by Flagged desc --}}
    @foreach($user as $object)

        <div class="container">
            <div class="row">
                
                
                <div class="col-md-10"><b>{{$object->firstname}} {{$object->lastname}}</b></div>
                
                <div class="panel-body">
                    <img src="/img/avatar/{{ $object->avatar}}"
                         style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                    <div class="col-sm-4">
                         {{-- Admin action for flagging a user --}}
                        <label>Flagged:</label>
                        @if ($object->flagged != 1)
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                        @else
                            <span class="glyphicon glyphicon-star"</span>
                        @endif
                        <p class="Email">{{$object->email}}</p>
                        <p class="DOB">{{$object->dob}}</p>
                    </div>
                    <p class="Gender"><b>Gender:</b>{{$object->gender}}</p>
                    <p class="Preference"><b>Preference:</b>{{$object->preference}}</p>
                    {{-- Buttons for Admin Input --}}
                     <form action="flaguser" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning">
                            Flag User
                        </button>
                     <input type="hidden" class="form-control" id="user"name="email" value={{$object->email}}>
                     </form>
                     
                        <form method="post" action="banuser">
                              {{ csrf_field() }}
                            <button name="id" type="submit"  class="btn btn-danger">
                             Ban User
                            </button>
                            <input type="hidden" class="form-control" id="user"name="email" value={{$object->email}}>
                        </form>
                        
                          <form method="post" action="viewprofile">
                              {{ csrf_field() }}
                            <button name="id" type="submit"  class="btn btn-info">
                            View User
                            </button>
                            <input type="hidden" name="UserProfileforAdmin" value="{{ $object->id }}">
                        </form>
                        
                    <div class="col-sm-4">
                        <div class="col-xs-3">
                             <p class="User Status"><b>User Status:</b>
                            @if ($object->status == 1)
                            <p>Verified</p>
                            @else
                            <p> Not verified</p> 
                            @endif
                            </p>
                            
                            <p class="Login Status"><b>Verification status:</b>
                            @if ($object->firstLogin == 1)
                            <p>First Login</p>
                            @else
                            <p>Current User</p> 
                            @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection