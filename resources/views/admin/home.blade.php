@extends('layouts.app_admin')
@section('title', ' - Home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome Admin {{ Auth::user()['name'] }}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.send') }}">
                            {{ csrf_field() }}
                        <div class="col-md-8 col-md-offset-4">
                            <form action>
                                <textarea name="message" rows="10" cols="30">message to users</textarea>
                                <button type="submit" class="btn btn-primary">
                                    send notifications
                                </button>
                            </form>
                        </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection
