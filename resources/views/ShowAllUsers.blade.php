{{-- For each loop that displays the user data from the database --}}
<h1>Admin User View</h1>
@foreach($user as $object)
<label class="name"><b>{{$object->firstname}} {{$object->lastname}}</b></label>
 <table class="table">
             <td>  
             {{-- Displaying User Avatar --}}
                     <img src="/img/avatar/{{ $object->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                </td>  
                <td>
                      <p class="Email">{{$object->email}}</p>
                     <p class="Email">{{$object->dob}}</p>
                </td>  
    
                <td>
                     <label><b>Gender</b></label>
                     <p class="Email">{{$object->gender}}</p>
                    <label><b>Preference</b></label>
                     <p class="Email">{{$object->preference}}</p>
                </td>
                <td>
                    <label>Status</label>
                    <p class="Login status">{{$object->status}}</p>
                    <label>Verification Status</label>
                    <p class="Verification">{{$object->firstLogin}}</p>
                </td>
                <td>
                    <button type="button" class="btn btn-warning">Flag User</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger">Ban User</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger">View User</button>
                </td>
                
                
                
        </table>
        @endforeach
                     