@extends('layouts.app')
@section('title', ' - Matches')
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






        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- Getting the specified user image file and displaying it. Default value is default.jpg-->
                    <img src="{{ asset("/img/avatar/".$avatar)}}"
                         style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                </div>
            </div>
        </div>


<!-- edit form column -->
<div class="col-md-9 personal-info">











    <form class="form-horizontal">


    <!-- First Name -->
    <div class="form-group">
        <label for="name" class="col-md-3 control-label">First Name</label>

        <div class="col-md-6">
            <input id="firstname" type="text" class="form-control" name="firstname"
                   value="{!! $firstname !!}"  autofocus disabled>


        </div>
    </div>



    <!-- Last Name -->
    <div class="form-group">
        <label for="name" class="col-md-3 control-label">Last Name</label>

        <div class="col-md-6">
            <input id="lastname" type="text" class="form-control" name="lastname" value="{!! $lastname !!}"  autofocus disabled>
        </div>
    </div>


    <!-- Gender -->
    <div class="form-group">
        <label for="gender" class="col-md-3 control-label">Gender</label>

        <div class="col-md-2">

            <select class="form-control" name="gender" disabled>

                <option value="Male" {{ $gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $gender === 'female' ? 'selected' : '' }}>Female</option>

            </select>

        </div>
    </div>

    <!-- for DOB section to populate data into input fields present in Data table -->
<?php


$splitDOB = strtotime($dob);
$year = date('Y', $splitDOB);
$month = date('F', $splitDOB);
$day = date('d', $splitDOB);
?>


<!-- Date of Birth -->
    <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">Date of birth</label>

        <div class="col-md-2">
            <select name="month" class="form-control" id="Month" onchange="disableDays()" disabled>
                <option value="01" {{ $month === 'January' ? 'selected' : '' }}>January</option>
                <option value="02" {{ $month === 'February' ? 'selected' : '' }}>February</option>
                <option value="03" {{ $month === 'March' ? 'selected' : '' }}>March</option>
                <option value="04" {{ $month === 'April' ? 'selected' : '' }}>April</option>
                <option value="05" {{ $month === 'May' ? 'selected' : '' }}>May</option>
                <option value="06" {{ $month === 'June' ? 'selected' : '' }}>June</option>
                <option value="07" {{ $month === 'July' ? 'selected' : '' }}>July</option>
                <option value="08" {{ $month === 'August' ? 'selected' : '' }}>August</option>
                <option value="09" {{ $month === 'September' ? 'selected' : '' }}>September</option>
                <option value="10" {{ $month === 'October' ? 'selected' : '' }}>October</option>
                <option value="11" {{ $month === 'November' ? 'selected' : '' }}>November</option>
                <option value="12" {{ $month === 'December' ? 'selected' : '' }}>December</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="day" class="form-control" id="Days" disabled>
                @for($i = 1; $i <= 31; $i++)
                    <option value="{{($i<10) ? "0".$i : $i}}" {{ $day === "{$i}" ? 'selected' : '' }}> {{$i}} </option>
                @endfor
            </select>
        </div>
        <div class="col-md-2">
            <select name="year" class="form-control" id="Year" disabled>
                @for($i = date("Y");  $i >=1990; $i--)

                    {{$j = $i}}};
                    <option value="{{$i}}" {{ $year === "{$i}" ? 'selected' : '' }}> {{$i}} </option>
                @endfor
            </select>
        </div>
    </div>














        <!-- About me input -->

        <div class="form-group">
            <label for="name" class="col-md-3 control-label">About Me</label>

            <div class="col-md-6">
                            <textarea id="bio" type="text" class="form-control" name="bio"
                                      placeholder="{{ $aboutme }}" autofocus disabled></textarea>
            </div>
        </div>


        <!-- Nickname Name -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Nickname</label>

            <div class="col-md-6">
                <input id="nickname" type="text" class="form-control" name="nickname"
                       value="{{ $nickname }}" autofocus disabled>


            </div>
        </div>


        <!-- Location -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Location</label>
            <div class="col-md-6">
                <input id="location" name="location" type="text" class="typeahead form-control" autocomplete="off"
                       value="{{ $location }}" disabled>

            </div>
        </div>


        <!-- smoking  -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Smoking</label>

            <!-- smoking -->
            <div class="col-md-3">

                <select class="form-control" name="smoking" disabled>
                    <option value="single" {{  $smoking  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="TRUE" {{ $smoking === 1 ? 'selected' : '' }}>Yes</option>
                    <option value="FALSE" {{ $smoking === 0 ? 'selected' : '' }}>No</option>

                </select>


            </div>

        </div>


        <!-- Status -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Status</label>

            <div class="col-md-2">

                <select class="form-control" name="status" disabled>
                    <option value="single" {{  $status  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="single" {{  $status  === 'single' ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ $status === 'married' ? 'selected' : '' }}>Married</option>
                    <option value="divorced" {{ $status  === 'divorced' ? 'selected' : '' }}>Divorced</option>
                    <option value="complicated" {{ $status === 'complicated' ? 'selected' : '' }}>Complicated</option>


                </select>

            </div>
        </div>


        <!-- Occupation -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Occupation</label>

            <div class="col-md-2">

                <select class="form-control" name="occupation" disabled>

                    <option value="self-emplyed" {{  $occupation  === 'self-emplyed' ? 'selected' : '' }}>Self-Emplyed
                    </option>
                    <option value="single" {{  $occupation  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="engineer" {{ $occupation === 'engineer' ? 'selected' : '' }}>Engineer</option>
                    <option value="doctor" {{ $occupation  === 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="writer" {{ $occupation === 'writer' ? 'selected' : '' }}>Writer</option>
                    <option value="student" {{ $occupation === 'student' ? 'selected' : '' }}>Student</option>
                    <option value="tradesman" {{ $occupation === 'tradesman' ? 'selected' : '' }}>Tradesman</option>
                    <option value="teacher" {{ $occupation === 'teacher' ? 'selected' : '' }}>Teacher</option>
                </select>

            </div>
        </div>


        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Religion</label>

            <div class="col-md-3">
                <select class="form-control" name="religion" disabled>
                    <option value="single" {{  $religion  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="islam" {{  $religion  === 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="hinduism" {{ $religion === 'hinduism' ? 'selected' : '' }}>Hinduism</option>
                    <option value="christian" {{ $religion  === 'christian' ? 'selected' : '' }}>Christian</option>
                    <option value="judaism" {{ $religion === 'judaism' ? 'selected' : '' }}>Judaism</option>
                    <option value="buddhism" {{ $religion === 'buddhism' ? 'selected' : '' }}>Buddhism</option>
                    <option value="atheist" {{ $religion === 'atheist' ? 'selected' : '' }}>atheist</option>
                </select>


            </div>
        </div>


        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Ethnicity/Background</label>

            <div class="col-md-3">
                <select class="form-control" name="Ethnicity" disabled>
                    <option value="single" {{  $ethnicity  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="white/caucasian" {{  $ethnicity  === 'white/caucasian' ? 'selected' : '' }}>
                        White/Caucasian
                    </option>
                    <option value="hispanic/latino" {{ $ethnicity === 'hispanic/latino' ? 'selected' : '' }}>
                        Hispanic/Latino
                    </option>
                    <option value="black/african" {{ $ethnicity  === 'black/african' ? 'selected' : '' }}>
                        Black/African
                    </option>
                    <option value="middleeastern" {{ $ethnicity === 'middleeastern' ? 'selected' : '' }}>Middle
                        Eastern
                    </option>
                    <option value="asian" {{ $ethnicity === 'asian' ? 'selected' : '' }}>Asian</option>
                    <option value="indian" {{ $ethnicity === 'indian' ? 'selected' : '' }}>Indian</option>
                    <option value="aboriginal" {{ $ethnicity === 'aboriginal' ? 'selected' : '' }}>Aboriginal</option>
                    <option value="islander" {{ $ethnicity === 'islander' ? 'selected' : '' }}>Other Islander</option>
                    <option value="mixedrace" {{ $ethnicity === 'mixedrace' ? 'selected' : '' }}>Mixed Race</option>
                    <option value="other" {{ $ethnicity === 'other' ? 'selected' : '' }}>Other</option>
                </select>


            </div>
        </div>


        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Height</label>

            <div class="col-md-3">
                <select class="form-control" name="height" disabled>
                    <option value="single" {{  $height  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="151" {{ $height  === 151 ? 'selected' : '' }}>Under 5'0/152 cm</option>
                    <option value="152" {{ $height === 152 ? 'selected' : '' }}>5'0/152 cm</option>
                    <option value="154" {{ $height  === 154 ? 'selected' : '' }}>5'1/154 cm</option>
                    <option value="157" {{ $height === 157 ? 'selected' : '' }}>5'2/157 cm</option>
                    <option value="160" {{ $height === 160 ? 'selected' : '' }}>5'3/160 cm</option>
                    <option value="162" {{ $height === 162 ? 'selected' : '' }}>5'4/162 cm</option>
                    <option value="165" {{ $height === 165 ? 'selected' : '' }}>5'5/165 cm</option>
                    <option value="167" {{ $height === 167 ? 'selected' : '' }}>5'6/167 cm</option>
                    <option value="170" {{ $height === 170 ? 'selected' : '' }}>5'7/170 cm</option>
                    <option value="172" {{ $height === 172 ? 'selected' : '' }}>5'8/172 cm</option>
                    <option value="175" {{ $height === 175 ? 'selected' : '' }}>5'9/175 cm</option>
                    <option value="177" {{ $height === 177 ? 'selected' : '' }}>5'10/177 cm</option>
                    <option value="180" {{ $height === 180 ? 'selected' : '' }}>5'11/180 cm</option>
                    <option value="183" {{ $height === 183 ? 'selected' : '' }}>6'0/183 cm</option>
                    <option value="185" {{ $height === 185 ? 'selected' : '' }}>6'1/185 cm</option>
                    <option value="188" {{ $height === 188 ? 'selected' : '' }}>6'2/188 cm</option>
                    <option value="190" {{ $height === 190 ? 'selected' : '' }}>6'3/190 cm</option>
                    <option value="191" {{ $height === 191 ? 'selected' : '' }}>Over 6'3/190 cm</option>


                </select>


            </div>
        </div>


        <!-- Hobbies 1 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Hobbies</label>

            <!-- Hobbies 1 -->
            <div class="col-md-3">

                <select class="form-control" name="hobbies1" disabled>
                    <option value="single" {{  $hobbies1  === null ? 'selected' : '' }}>Not Specified</option>

                    <option value="hiking" {{ $hobbies1 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                    <option value="dancing" {{ $hobbies1 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                    <option value="shopping" {{ $hobbies1 === 'shopping' ? 'selected' : '' }}>Shopping</option>
                    <option value="camping" {{ $hobbies1 === 'camping' ? 'selected' : '' }}>Camping</option>
                    <option value="gaming" {{ $hobbies1 === 'gaming' ? 'selected' : '' }}>Video Gaming</option>
                    <option value="writing" {{ $hobbies1 === 'writing' ? 'selected' : '' }}>Writing</option>
                    <option value="hunting" {{ $hobbies1 === 'hunting' ? 'selected' : '' }}>Hunting</option>
                </select>


            </div>

        </div>

        <!-- Hobbies 2 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>
            <div class="col-md-3">

                <select class="form-control" name="hobbies2" disabled>
                    <option value="single" {{  $hobbies2  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="hiking" {{ $hobbies2 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                    <option value="dancing" {{ $hobbies2 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                    <option value="shopping" {{ $hobbies2 === 'shopping' ? 'selected' : '' }}>Shopping</option>
                    <option value="camping" {{ $hobbies2 === 'camping' ? 'selected' : '' }}>Camping</option>
                    <option value="gaming" {{ $hobbies2 === 'gaming' ? 'selected' : '' }}>Video Gaming</option>
                    <option value="writing" {{ $hobbies2 === 'writing' ? 'selected' : '' }}>Writing</option>
                    <option value="hunting" {{ $hobbies2 === 'hunting' ? 'selected' : '' }}>Hunting</option>
                </select>


            </div>

        </div>


        <!-- Hobbies 3 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>
            <div class="col-md-3">

                <select class="form-control" name="hobbies3" disabled>
                    <option value="single" {{  $hobbies3  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="hiking" {{ $hobbies3 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                    <option value="dancing" {{ $hobbies3 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                    <option value="shopping" {{ $hobbies3 === 'shopping' ? 'selected' : '' }}>Shopping</option>
                    <option value="camping" {{ $hobbies3 === 'camping' ? 'selected' : '' }}>Camping</option>
                    <option value="gaming" {{ $hobbies3 === 'gaming' ? 'selected' : '' }}>Video Gaming</option>
                    <option value="writing" {{ $hobbies3 === 'writing' ? 'selected' : '' }}>Writing</option>
                    <option value="hunting" {{ $hobbies3 === 'hunting' ? 'selected' : '' }}>Hunting</option>
                </select>


            </div>

        </div>


        <!-- Hobbies 4 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>
            <div class="col-md-3">

                <select class="form-control" name="hobbies4" disabled>
                    <option value="single" {{  $hobbies4  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="hiking" {{ $hobbies4 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                    <option value="dancing" {{ $hobbies4 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                    <option value="shopping" {{ $hobbies4 === 'shopping' ? 'selected' : '' }}>Shopping</option>
                    <option value="camping" {{ $hobbies4 === 'camping' ? 'selected' : '' }}>Camping</option>
                    <option value="gaming" {{ $hobbies4 === 'gaming' ? 'selected' : '' }}>Video Gaming</option>
                    <option value="writing" {{ $hobbies4 === 'writing' ? 'selected' : '' }}>Writing</option>
                    <option value="hunting" {{ $hobbies4 === 'hunting' ? 'selected' : '' }}>Hunting</option>
                </select>


            </div>

        </div>


        <!-- Hobbies 5 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>
            <div class="col-md-3">

                <select class="form-control" name="hobbies5" disabled>
                    <option value="single" {{  $hobbies5  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="hiking" {{ $hobbies5 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                    <option value="dancing" {{ $hobbies5 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                    <option value="shopping" {{ $hobbies5 === 'shopping' ? 'selected' : '' }}>Shopping</option>
                    <option value="camping" {{ $hobbies5 === 'camping' ? 'selected' : '' }}>Camping</option>
                    <option value="gaming" {{ $hobbies5 === 'gaming' ? 'selected' : '' }}>Video Gaming</option>
                    <option value="writing" {{ $hobbies5 === 'writing' ? 'selected' : '' }}>Writing</option>
                    <option value="hunting" {{ $hobbies5 === 'hunting' ? 'selected' : '' }}>Hunting</option>
                </select>


            </div>

        </div>


        <!--

        ******
        *****
        *****
        Interest
       -->


        <!-- Interest 1 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Interests</label>

            <!-- interest 1 -->
            <div class="col-md-3">

                <select class="form-control" name="interest1" disabled>
                    <option value="single" {{  $interest1  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="tech" {{ $interest1 === 'tech' ? 'selected' : '' }}>Tech</option>
                    <option value="science" {{ $interest1 === 'science' ? 'selected' : '' }}>Science</option>
                    <option value="art" {{ $interest1 === 'art' ? 'selected' : '' }}>Art</option>
                    <option value="history" {{ $interest1 === 'history' ? 'selected' : '' }}>History</option>
                    <option value="sports" {{ $interest1 === 'sports' ? 'selected' : '' }}>Sports</option>
                    <option value="literature" {{ $interest1 === 'literature' ? 'selected' : '' }}>Literature</option>
                    <option value="traveling" {{ $interest1 === 'traveling' ? 'selected' : '' }}>Traveling</option>
                </select>


            </div>

        </div>


        <!-- Interest 2 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>

            <!-- Interest 2 -->
            <div class="col-md-3">

                <select class="form-control" name="interest2" disabled>
                    <option value="single" {{  $interest2  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="tech" {{ $interest2 === 'tech' ? 'selected' : '' }}>Tech</option>
                    <option value="science" {{ $interest2 === 'science' ? 'selected' : '' }}>Science</option>
                    <option value="art" {{ $interest2 === 'art' ? 'selected' : '' }}>Art</option>
                    <option value="history" {{ $interest2 === 'history' ? 'selected' : '' }}>History</option>
                    <option value="sports" {{ $interest2 === 'sports' ? 'selected' : '' }}>Sports</option>
                    <option value="literature" {{ $interest2 === 'literature' ? 'selected' : '' }}>Literature</option>
                    <option value="traveling" {{ $interest2 === 'traveling' ? 'selected' : '' }}>Traveling</option>
                </select>


            </div>

        </div>


        <!-- Interest 3 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>

            <!-- Interest 3 -->
            <div class="col-md-3">

                <select class="form-control" name="interest3" disabled>
                    <option value="single" {{  $interest3  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="tech" {{ $interest3 === 'tech' ? 'selected' : '' }}>Tech</option>
                    <option value="science" {{ $interest3 === 'science' ? 'selected' : '' }}>Science</option>
                    <option value="art" {{ $interest3 === 'art' ? 'selected' : '' }}>Art</option>
                    <option value="history" {{ $interest3 === 'history' ? 'selected' : '' }}>History</option>
                    <option value="sports" {{ $interest3 === 'sports' ? 'selected' : '' }}>Sports</option>
                    <option value="literature" {{ $interest3 === 'literature' ? 'selected' : '' }}>Literature</option>
                    <option value="traveling" {{ $interest3 === 'traveling' ? 'selected' : '' }}>Traveling</option>
                </select>


            </div>

        </div>


        <!-- Interest 4 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>

            <!-- Interest 4 -->
            <div class="col-md-3">

                <select class="form-control" name="interest4" disabled>
                    <option value="single" {{  $interest4  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="tech" {{ $interest4 === 'tech' ? 'selected' : '' }}>Tech</option>
                    <option value="science" {{ $interest4 === 'science' ? 'selected' : '' }}>Science</option>
                    <option value="art" {{ $interest4 === 'art' ? 'selected' : '' }}>Art</option>
                    <option value="history" {{ $interest4 === 'history' ? 'selected' : '' }}>History</option>
                    <option value="sports" {{ $interest4 === 'sports' ? 'selected' : '' }}>Sports</option>
                    <option value="literature" {{ $interest4 === 'literature' ? 'selected' : '' }}>Literature</option>
                    <option value="traveling" {{ $interest4 === 'traveling' ? 'selected' : '' }}>Traveling</option>
                </select>


            </div>

        </div>


        <!-- Interest 5 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>

            <!-- Interest 5 -->
            <div class="col-md-3">

                <select class="form-control" name="interest5" disabled>
                    <option value="single" {{  $interest5  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="tech" {{ $interest5 === 'tech' ? 'selected' : '' }}>Tech</option>
                    <option value="science" {{ $interest5 === 'science' ? 'selected' : '' }}>Science</option>
                    <option value="art" {{ $interest5 === 'art' ? 'selected' : '' }}>Art</option>
                    <option value="history" {{ $interest5 === 'history' ? 'selected' : '' }}>History</option>
                    <option value="sports" {{ $interest5 === 'sports' ? 'selected' : '' }}>Sports</option>
                    <option value="literature" {{ $interest5 === 'literature' ? 'selected' : '' }}>Literature</option>
                    <option value="traveling" {{ $interest5 === 'traveling' ? 'selected' : '' }}>Traveling</option>
                </select>


            </div>

        </div>


        <!-- Language 1 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label">Languages</label>

            <!-- language -->
            <div class="col-md-3">

                <select class="form-control" name="language1" disabled>
                    <option value="single" {{  $language1  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="english" {{ $language1 === 'english' ? 'selected' : '' }}>English</option>
                    <option value="french" {{ $language1 === 'french' ? 'selected' : '' }}>French</option>
                    <option value="spanish" {{ $language1 === 'spanish' ? 'selected' : '' }}>Spanish</option>
                    <option value="chinease" {{ $language1 === 'chinease' ? 'selected' : '' }}>Chinease</option>
                    <option value="hindi" {{ $language1 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                    <option value="arabic" {{ $language1 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                    <option value="urdu" {{ $language1 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                </select>


            </div>

        </div>


        <!-- Language 2 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>

            <!-- language 2-->
            <div class="col-md-3">

                <select class="form-control" name="language2" disabled>
                    <option value="single" {{  $language2  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="english" {{ $language2 === 'english' ? 'selected' : '' }}>English</option>
                    <option value="french" {{ $language2 === 'french' ? 'selected' : '' }}>French</option>
                    <option value="spanish" {{ $language2 === 'spanish' ? 'selected' : '' }}>Spanish</option>
                    <option value="chinease" {{ $language2 === 'chinease' ? 'selected' : '' }}>Chinease</option>
                    <option value="hindi" {{ $language2 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                    <option value="arabic" {{ $language2 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                    <option value="urdu" {{ $language2 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                </select>


            </div>

        </div>


        <!-- Language 3 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>

            <!-- language   3 -->
            <div class="col-md-3">

                <select class="form-control" name="language3" disabled>
                    <option value="single" {{  $language3  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="english" {{ $language3 === 'english' ? 'selected' : '' }}>English</option>
                    <option value="french" {{ $language3 === 'french' ? 'selected' : '' }}>French</option>
                    <option value="spanish" {{ $language3 === 'spanish' ? 'selected' : '' }}>Spanish</option>
                    <option value="chinease" {{ $language3 === 'chinease' ? 'selected' : '' }}>Chinease</option>
                    <option value="hindi" {{ $language3 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                    <option value="arabic" {{ $language3 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                    <option value="urdu" {{ $language3 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                </select>


            </div>

        </div>


        <!-- Language 4 -->
        <div class="form-group" disabled>
            <label for="name" class="col-md-3 control-label"></label>

            <!-- language -->
            <div class="col-md-3">

                <select class="form-control" name="language4" disabled>
                    <option value="single" {{  $language4  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="english" {{ $language4 === 'english' ? 'selected' : '' }}>English</option>
                    <option value="french" {{ $language4 === 'french' ? 'selected' : '' }}>French</option>
                    <option value="spanish" {{ $language4 === 'spanish' ? 'selected' : '' }}>Spanish</option>
                    <option value="chinease" {{ $language4 === 'chinease' ? 'selected' : '' }}>Chinease</option>
                    <option value="hindi" {{ $language4 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                    <option value="arabic" {{ $language4 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                    <option value="urdu" {{ $language4 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                </select>


            </div>

        </div>


        <!-- Language 5 -->
        <div class="form-group">
            <label for="name" class="col-md-3 control-label"></label>

            <!-- language 5 -->
            <div class="col-md-3">

                <select class="form-control" name="language5" disabled>
                    <option value="single" {{  $language5  === null ? 'selected' : '' }}>Not Specified</option>
                    <option value="english" {{ $language5 === 'english' ? 'selected' : '' }}>English</option>
                    <option value="french" {{ $language5 === 'french' ? 'selected' : '' }}>French</option>
                    <option value="spanish" {{ $language5 === 'spanish' ? 'selected' : '' }}>Spanish</option>
                    <option value="chinease" {{ $language5 === 'chinease' ? 'selected' : '' }}>Chinease</option>
                    <option value="hindi" {{ $language5 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                    <option value="arabic" {{ $language5 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                    <option value="urdu" {{ $language5 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                </select>


            </div>

        </div>













    </form>

</div>




@endsection