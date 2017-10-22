@extends('layouts.app')
@section('title', $MatchUser[0]->firstname)
@section('content')




    @foreach ($MatchUser as $object)
        @php
            $firstname = $object->firstname;
            $lastname = $object->lastname;
            $gender = $object->gender;
            $dob   = $object->dob;
            $splitDOB = strtotime($dob);
            $avatar =  $object->avatar;


        @endphp


    @endforeach


    @foreach($MatchProfile as $object)
        @php

            $aboutme = $object->bio;
            $nickname = $object->nickname;
            $location = $object->location;
            $status   = $object->status;
            $occupation = $object->occupation;
            $height     = $object->height;
            $smoking   = $object->smoking;
            $religion  = $object->religion;
            $ethnicity = $object->ethnicity;

            $lan1 = $object->language1;
            $lan2 = $object->language2;
            $lan3 = $object->language3;
            $lan4 = $object->language4;
            $lan5 = $object->language5;


            $interest1 = $object->interest1;
            $interest2 = $object->interest2;
            $interest3 = $object->interest3;
            $interest4 = $object->interest4;
            $interest5 = $object->interest5;

            $hobbies1 = $object->hobbies1;
            $hobbies2 = $object->hobbies2;
            $hobbies3 = $object->hobbies3;
            $hobbies4 = $object->hobbies4;
            $hobbies5 = $object->hobbies5;

            $language1 = $object->language1;
            $language2 = $object->language2;
            $language3 = $object->language3;
            $language4 = $object->language4;
            $language5 = $object->language5;




        @endphp
    @endforeach

    <div class="container" style="padding-top: 10px;">
        <div class="well">
            <div class="row">
                <img src="{{ asset("/img/avatar/".$avatar)}}"
                     style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                <h1>{!!$firstname . " " . $lastname !!}</h1>
                @if($nickname != "" or $nickname != null)
                    <h3>Also known as <b><em>{!!$nickname !!}</b></em></h3>
                @endif
            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <b>About {!! $firstname !!}</b>
                    <p>{!! $aboutme !!}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <b>Gender:</b>
                    <p>{!! ucfirst($dob) !!}</p>
                </div>
                <div class="col-sm-3 col-md-2">
                    <b>Age:</b>
                    <p>{!! ucfirst($dob) !!}</p>
                </div>

                <div class="col-sm-3  col-md-2">
                    <b>Location:</b>
                    <p>{!! ucfirst($location) !!}</p>
                </div>

                <div class="col-sm-3  col-md-2">
                    <b>Status:</b>
                    <p>{!! ucfirst($status) !!}</p>
                </div>

                <div class="col-sm-3  col-md-2">
                    <b>Occupation:</b>
                    <p>{!! ucfirst($occupation) !!}</p>
                </div>

                <div class="col-sm-3  col-md-2">
                    <b>Religion:</b>
                    <p>{!! ucfirst($religion) !!}</p>
                </div>

                <div class="col-sm-3  col-md-2">
                    <b>Ethnicity:</b>
                    <p>{!! ucfirst($ethnicity) !!}</p>
                </div>

                <div class="col-sm-3  col-md-2">
                    <b>Height:</b>
                    <p>~{!! ucfirst($height) !!}cm</p>
                </div>


            </div>

            <hr>
            <div class="row">

                <div class="col-sm-6">

                    <b> Interested in...</b>
                    <p>
                        @if($hobbies1 != null)
                            {!! ' '.ucfirst($hobbies1) !!},
                        @endif
                        @if($hobbies2 != null)
                            {!! ' '.ucfirst($hobbies2) !!},
                        @endif
                        @if($hobbies3 != null)
                            {!! ' '.ucfirst($hobbies3) !!},
                        @endif
                        @if($hobbies4 != null)
                            {!! ' '.ucfirst($hobbies4) !!},
                        @endif
                        @if($hobbies5 != null)
                            {!! ' '.ucfirst($hobbies5) !!},
                        @endif
                        .
                    </p>
                </div>

                <div class="col-sm-6">

                    <b> Likes doing..</b>
                    <p>
                        @if($interest1 != null)
                            {!! ' '.ucfirst($interest1) !!},
                        @endif
                        @if($interest1 != null)
                            {!! ' '.ucfirst($interest2) !!},
                        @endif
                        @if($interest1 != null)
                            {!! ' '.ucfirst($interest3) !!},
                        @endif
                        @if($interest1 != null)
                            {!! ' '.ucfirst($interest4) !!},
                        @endif
                        @if($interest1 != null)
                            {!! ' '.ucfirst($interest5) !!},
                        @endif
                        .
                    </p>
                </div>

            </div>


        </div>
    </div>

@endsection