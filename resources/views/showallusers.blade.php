@extends('layouts.app')

{{-- For each loop that displays the user data from the database --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
                    <form action="flaguser" method="post">
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-warning">Flag User</button>
                          {{$object->email}}
                          <input type="hidden" class="form-control" id="user"name="email" value={{$object->email}}>
                </div>
                    </form>
                  
                </td>
                <td>
                    <form action="deleteuser" method="post">
                          {{ csrf_field() }}
                    <!--- Button to trigger modal -->
                    <button type="submit"  action="deleteuser" method="post" class="btn btn-danger" >Ban User</button>
                    <input type="hidden" class="form-control" id="user"name="email" value={{$object->user_id}}>
                    </form>
                   

                <!-- Modal Code -->
                <!--<div id="MyModal" class="modal fade" role="dialog">-->
                <!--        <div class="modal-dialog">-->
                            <!--- Modal Content -->
                <!--            <div class="modal content">-->
                <!--                <div class="modal-header">Modal Header </div>-->
                <!--                     <div class="modal-body">Modal Body</div>-->
                <!--                          <div class="modal-footer"> Modal footer-->
                <!--                          </div>-->
                                    
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                </td>
                <td>
                    <button type="button" href="{{ url('/profile') }}" class="btn btn-primary">View User</button>
                </td>
                
                
                
        </table>
        @endforeach
                     