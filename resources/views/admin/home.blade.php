@extends('layouts.app_admin')
@section('title', ' - Home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome Admin {{ Auth::User()['name'] }}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.send') }}">
                            {{ csrf_field() }}
                        <div class="col-md-8 col-md-offset-2">
                            <form action>
                                <textarea placeholder="Message to users" name="message" rows="10" cols="60"></textarea>
                                <button type="submit" class="btn btn-primary">
                                    Send Notification
                                </button>
                            </form>
                        </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection
