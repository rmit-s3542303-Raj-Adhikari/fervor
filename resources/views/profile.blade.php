@extends('layouts.app')
@section('title', ' - Preferences')
@section('content')


    <div class="container-fluid">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
        <!-- edit form column -->
        <div class="col-md-10 col-md-offset-1 personal-info">

            @if ($errors->has('agecheck'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>You must be at least 18 to use this service</strong>
                </div>
            @endif

            <h1 class="text-center">Personal info</h1>


            <form class="form-horizontal" method="POST" action="{{ url('/updateUserTable') }}">
            {{ csrf_field() }}

            <!-- First Name -->
                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">First Name</label>

                    <div class="col-md-6">
                        <input id="firstname" type="text" class="form-control" name="firstname"
                               value="{{ Auth::user()['firstname'] }}" required autofocus>

                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <!-- Last Name -->
                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Last Name</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control" name="lastname"
                               value="{{ Auth::user()['lastname'] }}" required autofocus>

                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <!-- Gender -->
                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label for="gender" class="col-md-3 control-label">Gender</label>

                    <div class="col-md-2">

                        <select class="form-control" name="gender">
                            <option value=NULL {{  Auth::user()['gender']  === null ? 'selected' : '' }}>Not Specified
                            </option>
                            <option value="Male" {{ Auth::user()['gender'] === 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ Auth::user()['gender'] === 'female' ? 'selected' : '' }}>Female
                            </option>

                        </select>

                        @if ($errors->has('gender'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <!-- for DOB section to populate data into input fields present in Data table -->
            <?php

            $dob = Auth::user()['dob'];
            $splitDOB = strtotime($dob);
            $year = date('Y', $splitDOB);
            $month = date('F', $splitDOB);
            $day = date('d', $splitDOB);
            ?>


            <!-- Date of Birth -->
                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Date of birth</label>

                    <div class="col-md-2">
                        <select name="month" class="form-control" id="Month" onchange="disableDays()">
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
                        <select name="day" class="form-control" id="Days">
                            @for($i = 1; $i <= 31; $i++)
                                <option value="{{($i<10) ? "0".$i : $i}}" {{ $day === "{$i}" ? 'selected' : '' }}> {{$i}} </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="year" class="form-control" id="Year">
                            @for($i = date("Y");  $i >=1990; $i--)

                                {{$j = $i}}};
                                <option value="{{$i}}" {{ $year === "{$i}" ? 'selected' : '' }}> {{$i}} </option>
                            @endfor
                        </select>
                    </div>


                </div>


                <input name="agecheck" hidden value="dummy">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            Save Changes
                        </button>
                    </div>
                </div>


            </form>


            <!-- break -->
            <hr>
            <h1 class="text-center">Profile</h1>

            <!-- Uploading User Profile Picture to the website. User can choose a photo then upload it to the server via Upload Button-->
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- Getting the specified user image file and displaying it. Default value is default.jpg-->
                        <img src="{{ asset("/img/avatar/".$user->avatar)}}"
                             style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <form enctype="multipart/form-data" action="#" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <br>
                            <button type="submit" class=" btn btn-sm btn-primary">Upload Photo</button>

                        </form>
                    </div>
                </div>
            </div>

            <form class="form-horizontal" method="POST" action="{{ url('/addProfile') }}">
            {{ csrf_field() }}

            <?php

            $profile = DB::table('profiles')->select('nickname')->where('id', '=', Auth::user()->id)->value('nickname');
            $location = DB::table('profiles')->select('location')->where('id', '=', Auth::user()->id)->value('location');
            $status = DB::table('profiles')->select('status')->where('id', '=', Auth::user()->id)->value('status');
            $occupation = DB::table('profiles')->select('occupation')->where('id', '=', Auth::user()->id)->value('occupation');
            $bio = DB::table('profiles')->select('bio')->where('id', '=', Auth::user()->id)->value('bio');
            $religion = DB::table('profiles')->select('religion')->where('id', '=', Auth::user()->id)->value('religion');
            $ethnicity = DB::table('profiles')->select('Ethnicity')->where('id', '=', Auth::user()->id)->value('Ethnicity');
            $height = DB::table('profiles')->select('height')->where('id', '=', Auth::user()->id)->value('height');


            $hobbies = DB::table('profiles')->select('hobbies1')->where('id', '=', Auth::user()->id)->value('hobbies');
            $hobbies2 = DB::table('profiles')->select('hobbies2')->where('id', '=', Auth::user()->id)->value('hobbies2');
            $hobbies3 = DB::table('profiles')->select('hobbies3')->where('id', '=', Auth::user()->id)->value('hobbies3');
            $hobbies4 = DB::table('profiles')->select('hobbies4')->where('id', '=', Auth::user()->id)->value('hobbies4');
            $hobbies5 = DB::table('profiles')->select('hobbies5')->where('id', '=', Auth::user()->id)->value('hobbies5');

            $interest = DB::table('profiles')->select('interest1')->where('id', '=', Auth::user()->id)->value('interest');
            $interest2 = DB::table('profiles')->select('interest2')->where('id', '=', Auth::user()->id)->value('interest2');
            $interest3 = DB::table('profiles')->select('interest3')->where('id', '=', Auth::user()->id)->value('interest3');
            $interest4 = DB::table('profiles')->select('interest4')->where('id', '=', Auth::user()->id)->value('interest4');
            $interest5 = DB::table('profiles')->select('interest5')->where('id', '=', Auth::user()->id)->value('interest5');

            $language = DB::table('profiles')->select('language1')->where('id', '=', Auth::user()->id)->value('language');
            $language2 = DB::table('profiles')->select('language2')->where('id', '=', Auth::user()->id)->value('language2');
            $language3 = DB::table('profiles')->select('language3')->where('id', '=', Auth::user()->id)->value('language3');
            $language4 = DB::table('profiles')->select('language4')->where('id', '=', Auth::user()->id)->value('language4');
            $language5 = DB::table('profiles')->select('language5')->where('id', '=', Auth::user()->id)->value('language5');


            $smoking = DB::table('profiles')->select('smoking')->where('id', '=', Auth::user()->id)->value('smoking');


            ?>

            <!-- About me input -->

                <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">About Me</label>

                    <div class="col-md-6">
                            <textarea id="bio" type="text" class="form-control" name="bio"
                                      placeholder="{{ $bio }}" autofocus></textarea>

                        @if ($errors->has('bio'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <!-- Nickname Name -->
                <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Nickname</label>

                    <div class="col-md-6">
                        <input id="nickname" type="text" class="form-control" name="nickname"
                               value="{{ $profile }}" autofocus>

                        @if ($errors->has('nickname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <!-- Location -->
                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Location</label>
                    <div class="col-md-6">
                        <input id="location" name="location" type="text" class="typeahead form-control"
                               autocomplete="off"
                               value="{{ $location }}">
                        @if ($errors->has('location'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <!-- smoking  -->
                <div class="form-group{{ $errors->has('smoking') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Smoking</label>

                    <!-- smoking -->
                    <div class="col-md-3">

                        <select class="form-control" name="smoking">
                            <option {{  $smoking  === null ? 'selected' : '' }}>Not Specified</option>
                            <option value="TRUE" {{ $smoking === 1 ? 'selected' : '' }}>Yes</option>
                            <option value="FALSE" {{ $smoking === 0 ? 'selected' : '' }}>No</option>

                        </select>

                        @if ($errors->has('smoking'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('smoking') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>


                <!-- Status -->
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Status</label>

                    <div class="col-md-2">

                        <select class="form-control" name="status">
                            <option value=NULL {{  $status  === null ? 'selected' : '' }}>Not Specified</option>
                            <option value="single" {{  $status  === 'single' ? 'selected' : '' }}>Single</option>
                            <option value="married" {{ $status === 'married' ? 'selected' : '' }}>Married</option>
                            <option value="divorced" {{ $status  === 'divorced' ? 'selected' : '' }}>Divorced</option>
                            <option value="complicated" {{ $status === 'complicated' ? 'selected' : '' }}>Complicated
                            </option>


                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <!-- Occupation -->
                <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Occupation</label>

                    <div class="col-md-2">

                        <select class="form-control" name="occupation">
                            <option value=NULL {{  $occupation  === null ? 'selected' : '' }}>Not Specified</option>
                            <option value="self-emplyed" {{  $occupation  === 'self-emplyed' ? 'selected' : '' }}>
                                Self-Emplyed
                            </option>
                            <option value="engineer" {{ $occupation === 'engineer' ? 'selected' : '' }}>Engineer
                            </option>
                            <option value="doctor" {{ $occupation  === 'doctor' ? 'selected' : '' }}>Doctor</option>
                            <option value="writer" {{ $occupation === 'writer' ? 'selected' : '' }}>Writer</option>
                            <option value="student" {{ $occupation === 'student' ? 'selected' : '' }}>Student</option>
                            <option value="tradesman" {{ $occupation === 'tradesman' ? 'selected' : '' }}>Tradesman
                            </option>
                            <option value="teacher" {{ $occupation === 'teacher' ? 'selected' : '' }}>Teacher</option>
                        </select>
                        @if ($errors->has('occupation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Religion</label>

                    <div class="col-md-3">

                        <select class="form-control" name="religion">
                            <option value=NULL {{  $religion  === null ? 'selected' : '' }}>Not Specified</option>
                            <option value="hinduism" {{ $religion === 'hinduism' ? 'selected' : '' }}>Hinduism</option>
                            <option value="christian" {{ $religion  === 'christian' ? 'selected' : '' }}>Christian
                            </option>
                            <option value="judaism" {{ $religion === 'judaism' ? 'selected' : '' }}>Judaism</option>
                            <option value="buddhism" {{ $religion === 'buddhism' ? 'selected' : '' }}>Buddhism</option>
                            <option value="atheist" {{ $religion === 'atheist' ? 'selected' : '' }}>atheist</option>
                        </select>

                        @if ($errors->has('religion'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('Ethnicity') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Ethnicity/Background</label>

                    <div class="col-md-3">
                        <select class="form-control" name="Ethnicity">
                            <option value=NULL {{  $ethnicity  === null ? 'selected' : '' }}>Not Specified</option>
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
                            <option value="aboriginal" {{ $ethnicity === 'aboriginal' ? 'selected' : '' }}>Aboriginal
                            </option>
                            <option value="islander" {{ $ethnicity === 'islander' ? 'selected' : '' }}>Other Islander
                            </option>
                            <option value="mixedrace" {{ $ethnicity === 'mixedrace' ? 'selected' : '' }}>Mixed Race
                            </option>
                            <option value="other" {{ $ethnicity === 'other' ? 'selected' : '' }}>Other</option>
                        </select>

                        @if ($errors->has('Ethnicity'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Ethnicity') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Height</label>

                    <div class="col-md-3">
                        <select class="form-control" name="height">
                            <option value="0" {{  $height  === 0 ? 'selected' : '' }}>Not Specified</option>
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

                        @if ($errors->has('height'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <!-- Hobbies 1 -->
                <div class="form-group{{ $errors->has('hobbies') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Hobbies</label>
                    <!-- Hobbies 1 -->

                    <div class=" col-md-9">
                        <div class="col-md-2">
                            <select class="form-control" name="hobbies1">
                                <option value=NULL {{  $hobbies  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="hiking" {{ $hobbies === 'hiking' ? 'selected' : '' }}>Hiking</option>
                                <option value="dancing" {{ $hobbies === 'dancing' ? 'selected' : '' }}>Dancing</option>
                                <option value="shopping" {{ $hobbies === 'shopping' ? 'selected' : '' }}>Shopping
                                </option>
                                <option value="camping" {{ $hobbies === 'camping' ? 'selected' : '' }}>Camping</option>
                                <option value="gaming" {{ $hobbies === 'gaming' ? 'selected' : '' }}>Video Gaming
                                </option>
                                <option value="writing" {{ $hobbies === 'writing' ? 'selected' : '' }}>Writing</option>
                                <option value="hunting" {{ $hobbies === 'hunting' ? 'selected' : '' }}>Hunting</option>

                                <option value="photography" {{ $hobbies === 'photography' ? 'selected' : '' }}>
                                    Photography
                                </option>
                                <option value="drawing" {{ $hobbies === 'drawing' ? 'selected' : '' }}>
                                    Drawing/Painting
                                </option>
                                <option value="fishing" {{ $hobbies === 'fishing' ? 'selected' : '' }}>Fishing</option>
                                <option value="backpacking" {{ $hobbies === 'backpacking' ? 'selected' : '' }}>
                                    Backpacking
                                </option>
                                <option value="coin" {{ $hobbies === 'coin' ? 'selected' : '' }}>Coin Collecting
                                </option>
                            </select>
                        </div>
                        <!-- Hobbies 2 -->
                        <div class="col-md-2">
                            <select class="form-control" name="hobbies2">
                                <option value=NULL {{  $hobbies2  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="hiking" {{ $hobbies2 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                                <option value="dancing" {{ $hobbies2 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                                <option value="shopping" {{ $hobbies2 === 'shopping' ? 'selected' : '' }}>Shopping
                                </option>
                                <option value="camping" {{ $hobbies2 === 'camping' ? 'selected' : '' }}>Camping</option>
                                <option value="gaming" {{ $hobbies2 === 'gaming' ? 'selected' : '' }}>Video Gaming
                                </option>
                                <option value="writing" {{ $hobbies2 === 'writing' ? 'selected' : '' }}>Writing</option>
                                <option value="hunting" {{ $hobbies2 === 'hunting' ? 'selected' : '' }}>Hunting</option>

                                <option value="photography" {{ $hobbies2 === 'photography' ? 'selected' : '' }}>
                                    Photography
                                </option>
                                <option value="drawing" {{ $hobbies2 === 'drawing' ? 'selected' : '' }}>Drawing/Painting
                                </option>
                                <option value="fishing" {{ $hobbies2 === 'fishing' ? 'selected' : '' }}>Fishing</option>
                                <option value="backpacking" {{ $hobbies2 === 'backpacking' ? 'selected' : '' }}>
                                    Backpacking
                                </option>
                                <option value="coin" {{ $hobbies2 === 'coin' ? 'selected' : '' }}>Coin Collecting
                                </option>
                            </select>
                        </div>
                        <!-- Hobbies 3 -->
                        <div class="col-md-2">
                            <select class="form-control" name="hobbies3">
                                <option value=NULL {{  $hobbies3  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="hiking" {{ $hobbies3 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                                <option value="dancing" {{ $hobbies3 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                                <option value="shopping" {{ $hobbies3 === 'shopping' ? 'selected' : '' }}>Shopping
                                </option>
                                <option value="camping" {{ $hobbies3 === 'camping' ? 'selected' : '' }}>Camping</option>
                                <option value="gaming" {{ $hobbies3 === 'gaming' ? 'selected' : '' }}>Video Gaming
                                </option>
                                <option value="writing" {{ $hobbies3 === 'writing' ? 'selected' : '' }}>Writing</option>
                                <option value="hunting" {{ $hobbies3 === 'hunting' ? 'selected' : '' }}>Hunting</option>


                                <option value="photography" {{ $hobbies3 === 'photography' ? 'selected' : '' }}>
                                    Photography
                                </option>
                                <option value="drawing" {{ $hobbies3 === 'drawing' ? 'selected' : '' }}>Drawing/Painting
                                </option>
                                <option value="fishing" {{ $hobbies3 === 'fishing' ? 'selected' : '' }}>Fishing</option>
                                <option value="backpacking" {{ $hobbies3 === 'backpacking' ? 'selected' : '' }}>
                                    Backpacking
                                </option>
                                <option value="coin" {{ $hobbies3 === 'coin' ? 'selected' : '' }}>Coin Collecting
                                </option>
                            </select>
                        </div>
                        <!-- Hobbies 4 -->
                        <div class="col-md-2">
                            <select class="form-control" name="hobbies4">
                                <option value=NULL {{  $hobbies4  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="hiking" {{ $hobbies4 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                                <option value="dancing" {{ $hobbies4 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                                <option value="shopping" {{ $hobbies4 === 'shopping' ? 'selected' : '' }}>Shopping
                                </option>
                                <option value="camping" {{ $hobbies4 === 'camping' ? 'selected' : '' }}>Camping</option>
                                <option value="gaming" {{ $hobbies4 === 'gaming' ? 'selected' : '' }}>Video Gaming
                                </option>
                                <option value="writing" {{ $hobbies4 === 'writing' ? 'selected' : '' }}>Writing</option>
                                <option value="hunting" {{ $hobbies4 === 'hunting' ? 'selected' : '' }}>Hunting</option>
                                <option value="photography" {{ $hobbies4 === 'photography' ? 'selected' : '' }}>
                                    Photography
                                </option>
                                <option value="drawing" {{ $hobbies4 === 'drawing' ? 'selected' : '' }}>Drawing/Painting
                                </option>
                                <option value="fishing" {{ $hobbies4 === 'fishing' ? 'selected' : '' }}>Fishing</option>
                                <option value="backpacking" {{ $hobbies4 === 'backpacking' ? 'selected' : '' }}>
                                    Backpacking
                                </option>
                                <option value="coin" {{ $hobbies4 === 'coin' ? 'selected' : '' }}>Coin Collecting
                                </option>
                            </select>
                        </div>
                        <!-- Hobbies 5 -->
                        <div class="col-md-2">
                            <select class="form-control" name="hobbies5">
                                <option value=NULL {{  $hobbies5  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="hiking" {{ $hobbies5 === 'hiking' ? 'selected' : '' }}>Hiking</option>
                                <option value="dancing" {{ $hobbies5 === 'dancing' ? 'selected' : '' }}>Dancing</option>
                                <option value="shopping" {{ $hobbies5 === 'shopping' ? 'selected' : '' }}>Shopping
                                </option>
                                <option value="camping" {{ $hobbies5 === 'camping' ? 'selected' : '' }}>Camping</option>
                                <option value="gaming" {{ $hobbies5 === 'gaming' ? 'selected' : '' }}>Video Gaming
                                </option>
                                <option value="writing" {{ $hobbies5 === 'writing' ? 'selected' : '' }}>Writing</option>
                                <option value="hunting" {{ $hobbies5 === 'hunting' ? 'selected' : '' }}>Hunting</option>
                                <option value="photography" {{ $hobbies5 === 'photography' ? 'selected' : '' }}>
                                    Photography
                                </option>
                                <option value="drawing" {{ $hobbies5 === 'drawing' ? 'selected' : '' }}>Drawing/Painting
                                </option>
                                <option value="fishing" {{ $hobbies5 === 'fishing' ? 'selected' : '' }}>Fishing</option>
                                <option value="backpacking" {{ $hobbies5 === 'backpacking' ? 'selected' : '' }}>
                                    Backpacking
                                </option>
                                <option value="coin" {{ $hobbies5 === 'coin' ? 'selected' : '' }}>Coin Collecting
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Interest 1 -->
                <div class="form-group{{ $errors->has('interest') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Interests</label>
                    <div class=" col-md-9">
                        <!-- interest 1 -->
                        <div class="col-md-2">

                            <select class="form-control" name="interest1">
                                <option value=NULL {{  $interest  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="tech" {{ $interest === 'tech' ? 'selected' : '' }}>Tech</option>
                                <option value="science" {{ $interest === 'science' ? 'selected' : '' }}>Science</option>
                                <option value="art" {{ $interest === 'art' ? 'selected' : '' }}>Art</option>
                                <option value="history" {{ $interest === 'history' ? 'selected' : '' }}>History</option>
                                <option value="sports" {{ $interest === 'sports' ? 'selected' : '' }}>Sports</option>
                                <option value="literature" {{ $interest === 'literature' ? 'selected' : '' }}>Literature
                                </option>
                                <option value="traveling" {{ $interest === 'traveling' ? 'selected' : '' }}>Traveling
                                </option>


                                <option value="games" {{ $interest === 'games' ? 'selected' : '' }}>Games</option>
                                <option value="animals" {{ $interest === 'animals' ? 'selected' : '' }}>Animals</option>
                                <option value="psychology" {{ $interest === 'psychology' ? 'selected' : '' }}>Psychology
                                </option>
                                <option value="politics" {{ $interest === 'politics' ? 'selected' : '' }}>Politics
                                </option>
                                <option value="debate" {{ $interest === 'debate' ? 'selected' : '' }}>Debate</option>
                                <option value="cars" {{ $interest === 'cars' ? 'selected' : '' }}>Cars</option>
                            </select>
                        </div>


                        <!-- Interest 2 -->

                        <!-- Interest 2 -->
                        <div class="col-md-2">
                            <select class="form-control" name="interest2">
                                <option value=NULL {{  $interest2  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="tech" {{ $interest2 === 'tech' ? 'selected' : '' }}>Tech</option>
                                <option value="science" {{ $interest2 === 'science' ? 'selected' : '' }}>Science
                                </option>
                                <option value="art" {{ $interest2 === 'art' ? 'selected' : '' }}>Art</option>
                                <option value="history" {{ $interest2 === 'history' ? 'selected' : '' }}>History
                                </option>
                                <option value="sports" {{ $interest2 === 'sports' ? 'selected' : '' }}>Sports</option>
                                <option value="literature" {{ $interest2 === 'literature' ? 'selected' : '' }}>
                                    Literature
                                </option>
                                <option value="traveling" {{ $interest2 === 'traveling' ? 'selected' : '' }}>Traveling
                                </option>


                                <option value="games" {{ $interest2 === 'games' ? 'selected' : '' }}>Games</option>
                                <option value="animals" {{ $interest2 === 'animals' ? 'selected' : '' }}>Animals
                                </option>
                                <option value="psychology" {{ $interest2 === 'psychology' ? 'selected' : '' }}>
                                    Psychology
                                </option>
                                <option value="politics" {{ $interest2 === 'politics' ? 'selected' : '' }}>Politics
                                </option>
                                <option value="debate" {{ $interest2 === 'debate' ? 'selected' : '' }}>Debate</option>
                                <option value="cars" {{ $interest2 === 'cars' ? 'selected' : '' }}>Cars</option>
                            </select>
                        </div>


                        <!-- Interest 3 -->

                        <!-- Interest 3 -->
                        <div class="col-md-2">
                            <select class="form-control" name="interest3">
                                <option value=NULL {{  $interest3  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="tech" {{ $interest3 === 'tech' ? 'selected' : '' }}>Tech</option>
                                <option value="science" {{ $interest3 === 'science' ? 'selected' : '' }}>Science
                                </option>
                                <option value="art" {{ $interest3 === 'art' ? 'selected' : '' }}>Art</option>
                                <option value="history" {{ $interest3 === 'history' ? 'selected' : '' }}>History
                                </option>
                                <option value="sports" {{ $interest3 === 'sports' ? 'selected' : '' }}>Sports</option>
                                <option value="literature" {{ $interest3 === 'literature' ? 'selected' : '' }}>
                                    Literature
                                </option>
                                <option value="traveling" {{ $interest3 === 'traveling' ? 'selected' : '' }}>Traveling
                                </option>


                                <option value="games" {{ $interest3 === 'games' ? 'selected' : '' }}>Games</option>
                                <option value="animals" {{ $interest3 === 'animals' ? 'selected' : '' }}>Animals
                                </option>
                                <option value="psychology" {{ $interest3 === 'psychology' ? 'selected' : '' }}>
                                    Psychology
                                </option>
                                <option value="politics" {{ $interest3 === 'politics' ? 'selected' : '' }}>Politics
                                </option>
                                <option value="debate" {{ $interest3 === 'debate' ? 'selected' : '' }}>Debate</option>
                                <option value="cars" {{ $interest3 === 'cars' ? 'selected' : '' }}>Cars</option>
                            </select>
                        </div>


                        <!-- Interest 4 -->
                        <div class="col-md-2">
                            <select class="form-control" name="interest4">
                                <option value=NULL {{  $interest4  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="tech" {{ $interest4 === 'tech' ? 'selected' : '' }}>Tech</option>
                                <option value="science" {{ $interest4 === 'science' ? 'selected' : '' }}>Science
                                </option>
                                <option value="art" {{ $interest4 === 'art' ? 'selected' : '' }}>Art</option>
                                <option value="history" {{ $interest4 === 'history' ? 'selected' : '' }}>History
                                </option>
                                <option value="sports" {{ $interest4 === 'sports' ? 'selected' : '' }}>Sports</option>
                                <option value="literature" {{ $interest4 === 'literature' ? 'selected' : '' }}>
                                    Literature
                                </option>
                                <option value="traveling" {{ $interest4 === 'traveling' ? 'selected' : '' }}>Traveling
                                </option>


                                <option value="games" {{ $interest4 === 'games' ? 'selected' : '' }}>Games</option>
                                <option value="animals" {{ $interest4 === 'animals' ? 'selected' : '' }}>Animals
                                </option>
                                <option value="psychology" {{ $interest4 === 'psychology' ? 'selected' : '' }}>
                                    Psychology
                                </option>
                                <option value="politics" {{ $interest4 === 'politics' ? 'selected' : '' }}>Politics
                                </option>
                                <option value="debate" {{ $interest4 === 'debate' ? 'selected' : '' }}>Debate</option>
                                <option value="cars" {{ $interest4 === 'cars' ? 'selected' : '' }}>Cars</option>
                            </select>
                        </div>


                        <!-- Interest 5 -->
                        <div class="col-md-2">
                            <select class="form-control" name="interest5">
                                <option value=NULL {{  $interest5  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="tech" {{ $interest5 === 'tech' ? 'selected' : '' }}>Tech</option>
                                <option value="science" {{ $interest5 === 'science' ? 'selected' : '' }}>Science
                                </option>
                                <option value="art" {{ $interest5 === 'art' ? 'selected' : '' }}>Art</option>
                                <option value="history" {{ $interest5 === 'history' ? 'selected' : '' }}>History
                                </option>
                                <option value="sports" {{ $interest5 === 'sports' ? 'selected' : '' }}>Sports</option>
                                <option value="literature" {{ $interest5 === 'literature' ? 'selected' : '' }}>
                                    Literature
                                </option>
                                <option value="traveling" {{ $interest5 === 'traveling' ? 'selected' : '' }}>Traveling
                                </option>


                                <option value="games" {{ $interest5 === 'games' ? 'selected' : '' }}>Games</option>
                                <option value="animals" {{ $interest5 === 'animals' ? 'selected' : '' }}>Animals
                                </option>
                                <option value="psychology" {{ $interest5 === 'psychology' ? 'selected' : '' }}>
                                    Psychology
                                </option>
                                <option value="politics" {{ $interest5 === 'politics' ? 'selected' : '' }}>Politics
                                </option>
                                <option value="debate" {{ $interest5 === 'debate' ? 'selected' : '' }}>Debate</option>
                                <option value="cars" {{ $interest5 === 'cars' ? 'selected' : '' }}>Cars</option>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Language 1 -->
                <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Languages</label>
                    <!-- language -->
                    <div class="col-md-9">
                        <div class="col-md-2">
                            <select class="form-control" name="language1">
                                <option value=NULL {{  $language  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="english" {{ $language === 'english' ? 'selected' : '' }}>English</option>
                                <option value="french" {{ $language === 'french' ? 'selected' : '' }}>French</option>
                                <option value="spanish" {{ $language === 'spanish' ? 'selected' : '' }}>Spanish</option>
                                <option value="chinese" {{ $language === 'chinese' ? 'selected' : '' }}>Chinese</option>
                                <option value="hindi" {{ $language === 'hindi' ? 'selected' : '' }}>Hindi</option>
                                <option value="arabic" {{ $language === 'arabic' ? 'selected' : '' }}>Arabic</option>
                                <option value="urdu" {{ $language === 'urdu' ? 'selected' : '' }}>Urdu</option>
                            </select>
                        </div>

                        <!-- language 2-->
                        <div class="col-md-2">
                            <select class="form-control" name="language2">
                                <option value=NULL {{  $language2  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="english" {{ $language2 === 'english' ? 'selected' : '' }}>English
                                </option>
                                <option value="french" {{ $language2 === 'french' ? 'selected' : '' }}>French</option>
                                <option value="spanish" {{ $language2 === 'spanish' ? 'selected' : '' }}>Spanish
                                </option>
                                <option value="chinese" {{ $language2 === 'chinese' ? 'selected' : '' }}>Chinese
                                </option>
                                <option value="hindi" {{ $language2 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                                <option value="arabic" {{ $language2 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                                <option value="urdu" {{ $language2 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                            </select>
                        </div>


                        <!-- language 3 -->
                        <div class="col-md-2">

                            <select class="form-control" name="language3">
                                <option value=NULL {{  $language3  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="english" {{ $language3 === 'english' ? 'selected' : '' }}>English
                                </option>
                                <option value="french" {{ $language3 === 'french' ? 'selected' : '' }}>French</option>
                                <option value="spanish" {{ $language3 === 'spanish' ? 'selected' : '' }}>Spanish
                                </option>
                                <option value="chinese" {{ $language3 === 'chinese' ? 'selected' : '' }}>Chinese
                                </option>
                                <option value="hindi" {{ $language3 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                                <option value="arabic" {{ $language3 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                                <option value="urdu" {{ $language3 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                            </select>

                        </div>

                        <!-- Language 4 -->
                        <div class="col-md-2">
                            <select class="form-control" name="language4">
                                <option value=NULL {{  $language4  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="english" {{ $language4 === 'english' ? 'selected' : '' }}>English
                                </option>
                                <option value="french" {{ $language4 === 'french' ? 'selected' : '' }}>French</option>
                                <option value="spanish" {{ $language4 === 'spanish' ? 'selected' : '' }}>Spanish
                                </option>
                                <option value="chinese" {{ $language4 === 'chinese' ? 'selected' : '' }}>Chinese
                                </option>
                                <option value="hindi" {{ $language4 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                                <option value="arabic" {{ $language4 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                                <option value="urdu" {{ $language4 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                            </select>
                        </div>
                        <!-- language 5 -->
                        <div class="col-md-2">
                            <select class="form-control" name="language5">
                                <option value=NULL {{  $language5  === null ? 'selected' : '' }}>Not Specified</option>
                                <option value="english" {{ $language5 === 'english' ? 'selected' : '' }}>English
                                </option>
                                <option value="french" {{ $language5 === 'french' ? 'selected' : '' }}>French</option>
                                <option value="spanish" {{ $language5 === 'spanish' ? 'selected' : '' }}>Spanish
                                </option>
                                <option value="chinese" {{ $language5 === 'chinese' ? 'selected' : '' }}>Chinese
                                </option>
                                <option value="hindi" {{ $language5 === 'hindi' ? 'selected' : '' }}>Hindi</option>
                                <option value="arabic" {{ $language5 === 'arabic' ? 'selected' : '' }}>Arabic</option>
                                <option value="urdu" {{ $language5 === 'urdu' ? 'selected' : '' }}>Urdu</option>
                            </select>
                        </div>

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <script type="text/javascript">
        // For Location Typeahead
        var url = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function (query, process) {
                return $.get(url, {query: query}, function (data) {
                    return process(data);
                });
            }
        });

        //DOB

        function disableDays() {
            // get selected month
            var MonthSelect = document.getElementById("Month");
            var Month = MonthSelect.options[MonthSelect.selectedIndex].text;

            var DaySelectOptions = document.getElementById("Days").getElementsByTagName("option");

            DaySelectOptions[0].selected = true;

            // Disable/Enable appropriate days
            switch (Month) {
                case "February":
                    DaySelectOptions[29].disabled = true;
                    DaySelectOptions[30].disabled = true;
                    break;

                case "April":
                case "June":
                case "September":
                case "November":
                    DaySelectOptions[29].disabled = false;
                    DaySelectOptions[30].disabled = true;
                    break;

                case "January":
                case "March":
                case "May":
                case "July":
                case "August":
                case "October":
                case "December":
                    DaySelectOptions[29].disabled = false;
                    DaySelectOptions[30].disabled = false;
            }
        }


    </script>


@endsection