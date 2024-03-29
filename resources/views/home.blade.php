@extends('layouts.app')
@section('title', ' - Home')
@section('content')
    <div class="container"  style="padding-top: 10px">
    @if(Auth::user()['firstLogin'])

        <div class=" panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Welcome to Fervor!</h3>
            </div>
            <div class="panel-body">
                Right now your profile is blank!
                <br>
                <br>
                <strong><a href="{{route('profile')}}">Build your profile</a></strong> to start exploring your matches!
            </div>
        </div>

        @php
        Auth::user()['firstLogin'] = false;
        Auth::user()->save();
        @endphp

    @else

        {{--<div class="container">--}}


            {{--<div class="row bs-wizard" style="border-bottom:0;">--}}

                {{--<div class="col-md-4 bs-wizard-step complete">--}}
                    {{--<div class="text-center bs-wizard-stepnum">Update your information</div>--}}
                    {{--<div class="progress"><div class="progress-bar"></div></div>--}}
                    {{--<a href="#" class="bs-wizard-dot" data-toggle="collapse" href="#step-pane" aria-expanded="false"><span class="glyphicon" aria-hidden="true"></span></a>--}}

                {{--</div>--}}

                {{--<div class="col-md-4 bs-wizard-step active"><!-- active -->--}}
                    {{--<div class="text-center bs-wizard-stepnum">Upload a picture</div>--}}
                    {{--<div class="progress"><div class="progress-bar"></div></div>--}}
                    {{--<a href="#" class="bs-wizard-dot"><span class="glyphicon" aria-hidden="true"></span></a>--}}

                {{--</div>--}}

                {{--<div class="col-md-4 bs-wizard-step disabled"><!-- disabled -->--}}
                    {{--<div class="text-center bs-wizard-stepnum">Specify your preferences</div>--}}
                    {{--<div class="progress"><div class="progress-bar"></div></div>--}}
                    {{--<a href="#" class="bs-wizard-dot"><span class="glyphicon" aria-hidden="true"></span></a>--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}

    @endif

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Hello {{ Auth::user()['firstname'] }}!</div>
                    <img src="{{ asset("/img/avatar/".Auth::user()->avatar)}}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px;">
                    <div class="panel-body">
                        <p> Welcome To the Fervor dashboard! <br> Here you can start your adventure and find that special someone! </p>
                        
                    </div>
        
                </div>
            </div>
        </div>
    </div>
@endsection
