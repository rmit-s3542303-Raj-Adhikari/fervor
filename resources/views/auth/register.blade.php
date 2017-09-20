@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-centered">

                @if ($errors->has('agecheck'))
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>You must be at least 18 to use this service</strong>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <br>
                        <h3 class="text-center">Register for Fervor</h3>
                    </div>
                    <div class="well">

                        <!-- Register form -->
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <!-- First Name -->
                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname"
                                           value="{{ old('firstname') }}" required autofocus>

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
                                           value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Date of birth</label>

                                <div class="col-md-2">
                                    <select name="month" class="form-control" id="Month" onchange="disableDays()">
                                        <option value="01" selected>January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="day" class="form-control" id="Days">
                                        @for($i = 1; $i <= 31; $i++)
                                            <option value="{{($i<10) ? "0".$i : $i}}"> {{$i}} </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="year" class="form-control" id="Year">
                                        @for($i = date("Y");  $i >= 1990; $i--)
                                            <option value={{$i}}> {{$i}} </option>
                                        @endfor
                                    </select>
                                </div>


                            </div>


                            <!-- break -->
                            <hr>

                            <!-- Gender -->
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-3 control-label">I am a</label>

                                <div class="col-md-2">

                                    <select class="form-control" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-2 text-center">
                                    <label for="preference" class="control-label">Seeking a</label>
                                </div>

                                <div class="col-md-2">
                                    <select class="form-control" name="preference">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                            </div>

                            <!-- break -->
                            <hr>
                            <!-- Email -->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-3 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <!-- -->
                            <input name="agecheck" hidden value="dummy">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
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
