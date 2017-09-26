<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>




    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/extra.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


    <script type="text/javascript">


        function ethnicity() {


            if (document.getElementById("caucasian").checked) {
                document.getElementById('caucasianHidden').disabled = true;
            }else{
                document.getElementById('caucasianHidden').disabled = false;
            }

            if (document.getElementById("hispanic").checked) {
                document.getElementById('hispanicHidden').disabled = true;
            }else{
                document.getElementById('hispanicHidden').disabled = false;
            }

            if (document.getElementById("black").checked) {
                document.getElementById('blackHidden').disabled = true;
            }else{
                document.getElementById('blackHidden').disabled = false;
            }

            if (document.getElementById("middleeast").checked) {
                document.getElementById('middleeastHidden').disabled = true;
            }else{
                document.getElementById('middleeastHidden').disabled = false;
            }

            if (document.getElementById("asian").checked) {
                document.getElementById('asianHidden').disabled = true;
            }else{
                document.getElementById('asianHidden').disabled = false;
            }

            if (document.getElementById("indian").checked) {
                document.getElementById('indianHidden').disabled = true;
            }else{
                document.getElementById('indianHidden').disabled = false;
            }

            if (document.getElementById("aboriginal").checked) {
                document.getElementById('aboriginalHidden').disabled = true;
            }else{
                document.getElementById('aboriginalHidden').disabled = false;
            }

            if (document.getElementById("islander").checked) {
                document.getElementById('islanderHidden').disabled = true;
            }else{
                document.getElementById('islanderHidden').disabled = false;
            }

            if (document.getElementById("mixed").checked) {
                document.getElementById('mixedHidden').disabled = true;
            }else{
                document.getElementById('mixedHidden').disabled = false;
            }




            }

        function religion() {

            if (document.getElementById("hinduism").checked) {
                document.getElementById('hinduismHidden').disabled = true;
            } else {
                document.getElementById('hinduismHidden').disabled = false;
            }

            if (document.getElementById("chirstian").checked) {
                document.getElementById('chirstianHidden').disabled = true;
            } else {
                document.getElementById('chirstianHidden').disabled = false;
            }

            if (document.getElementById("judaism").checked) {
                document.getElementById('judaismHidden').disabled = true;
            } else {
                document.getElementById('judaismHidden').disabled = false;
            }

            if (document.getElementById("buddhism").checked) {
                document.getElementById('buddhismHidden').disabled = true;
            } else {
                document.getElementById('buddhismHidden').disabled = false;
            }

            if (document.getElementById("atheist").checked) {
                document.getElementById('atheistHidden').disabled = true;
            } else {
                document.getElementById('atheistHidden').disabled = false;
            }
        }





        function language() {


            if (document.getElementById("english").checked) {
                document.getElementById('englishHidden').disabled = true;
            } else {
                document.getElementById('englishHidden').disabled = false;
            }

            if (document.getElementById("french").checked) {
                document.getElementById('frenchHidden').disabled = true;
            } else {
                document.getElementById('frenchHidden').disabled = false;
            }

            if (document.getElementById("spanish").checked) {
                document.getElementById('spanishHidden').disabled = true;
            } else {
                document.getElementById('spanishHidden').disabled = false;
            }

            if (document.getElementById("chinese").checked) {
                document.getElementById('chineseHidden').disabled = true;
            } else {
                document.getElementById('chineseHidden').disabled = false;
            }


            if (document.getElementById("hindi").checked) {
                document.getElementById('hindiHidden').disabled = true;
            } else {
                document.getElementById('hindiHidden').disabled = false;
            }

            if (document.getElementById("arabic").checked) {
                document.getElementById('arabicHidden').disabled = true;
            } else {
                document.getElementById('arabicHidden').disabled = false;
            }

            if (document.getElementById("persian").checked) {
                document.getElementById('persianHidden').disabled = true;
            } else {
                document.getElementById('persianHidden').disabled = false;
            }

            if (document.getElementById("urdu").checked) {
                document.getElementById('urduHidden').disabled = true;
            } else {
                document.getElementById('urduHidden').disabled = false;
            }


        }



        function interest(){



            if (document.getElementById("tech").checked) {
                document.getElementById('techHidden').disabled = true;
            } else {
                document.getElementById('techHidden').disabled = false;
            }

            if (document.getElementById("science").checked) {
                document.getElementById('scienceHidden').disabled = true;
            } else {
                document.getElementById('scienceHidden').disabled = false;
            }

            if (document.getElementById("art").checked) {
                document.getElementById('artHidden').disabled = true;
            } else {
                document.getElementById('artHidden').disabled = false;
            }

            if (document.getElementById("history").checked) {
                document.getElementById('historyHidden').disabled = true;
            } else {
                document.getElementById('historyHidden').disabled = false;
            }


            if (document.getElementById("sports").checked) {
                document.getElementById('sportsHidden').disabled = true;
            } else {
                document.getElementById('sportsHidden').disabled = false;
            }

            if (document.getElementById("literature").checked) {
                document.getElementById('literatureHidden').disabled = true;
            } else {
                document.getElementById('literatureHidden').disabled = false;
            }

            if (document.getElementById("traveling").checked) {
                document.getElementById('travelingHidden').disabled = true;
            } else {
                document.getElementById('travelingHidden').disabled = false;
            }




        }

    </script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>



</div>







<div class="container">
    <h1>Match Preferences</h1>
    <hr>
    <div class="row">
        <!-- left column -->

        </div>










        <!-- edit form column -->
        <div class="col-md-9 personal-info">

















            <form class="form-horizontal" method="POST" action="{{ url('/updatePreference') }}">
            {{ csrf_field() }}

            <?php




            $ethnTech       = DB::table('preferences')->select('tech')->where('id', '=', 1)->value('tech');
            $ethnScience    = DB::table('preferences')->select('science')->where('id', '=', 1)->value('science');
            $ethnArt        = DB::table('preferences')->select('art')->where('id', '=', 1)->value('art');
            $ethnHistory    = DB::table('preferences')->select('history')->where('id', '=', 1)->value('history');
            $ethnSports     = DB::table('preferences')->select('sports')->where('id', '=', 1)->value('sports');
            $ethnLiterature = DB::table('preferences')->select('literature')->where('id', '=', 1)->value('literature');
            $ethnTraveling  = DB::table('preferences')->select('traveling')->where('id', '=', 1)->value('traveling');





            $ethnEnglish = DB::table('preferences')->select('english')->where('id', '=', 1)->value('english');
            $ethnFrench  = DB::table('preferences')->select('french')->where('id', '=', 1)->value('french');
            $ethnSpanish = DB::table('preferences')->select('spanish')->where('id', '=', 1)->value('spanish');
            $ethnChinese = DB::table('preferences')->select('chinese')->where('id', '=', 1)->value('chinese');
            $atheistHindi= DB::table('preferences')->select('hindi')->where('id', '=', 1)->value('hindi');
            $atheistArabic = DB::table('preferences')->select('arabic')->where('id', '=', 1)->value('arabic');
            $atheistPersian = DB::table('preferences')->select('persian')->where('id', '=', 1)->value('persian');
            $atheistUrdu = DB::table('preferences')->select('urdu')->where('id', '=', 1)->value('urdu');





            $religion = DB::table('profiles')->select('religion')->where('user_id', '=', Auth::user()->id)->value('religion');

            $ethnCaucasian = DB::table('preferences')->select('caucasian')->where('id', '=', 1)->value('caucasian');
            $ethnHispanic = DB::table('preferences')->select('hispanic')->where('id', '=', 1)->value('hispanic');
            $ethnBlack = DB::table('preferences')->select('black')->where('id', '=', 1)->value('black');

            $ethnMiddleeastern = DB::table('preferences')->select('middleeast')->where('id', '=', 1)->value('middleeast');
            $ethnAsian = DB::table('preferences')->select('asian')->where('id', '=', 1)->value('asian');
            $ethnIndian = DB::table('preferences')->select('indian')->where('id', '=', 1)->value('indian');
            $ethnAboriginal = DB::table('preferences')->select('aboriginal')->where('id', '=', 1)->value('aboriginal');
            $ethnIslander = DB::table('preferences')->select('islander')->where('id', '=', 1)->value('islander');
            $ethnMixedrace = DB::table('preferences')->select('mixed')->where('id', '=', 1)->value('mixed');
//            $ethnOther = DB::table('preferences')->select('other')->where('id', '=', 1)->value('other');

            $ethnHinduism = DB::table('preferences')->select('hinduism')->where('id', '=', 1)->value('hinduism');
            $ethnChirstian = DB::table('preferences')->select('chirstian')->where('id', '=', 1)->value('chirstian');
            $ethnJudaism  = DB::table('preferences')->select('judaism')->where('id', '=', 1)->value('judaism');
            $ethnBuddhism  = DB::table('preferences')->select('buddhism')->where('id', '=', 1)->value('buddhism');
            $atheistAtheist = DB::table('preferences')->select('atheist')->where('id', '=', 1)->value('atheist');





            $hobbies = DB::table('profiles')->select('hobbies1')->where('user_id', '=', Auth::user()->id)->value('hobbies');
            $hobbies2 = DB::table('profiles')->select('hobbies2')->where('user_id', '=', Auth::user()->id)->value('hobbies2');
            $hobbies3 = DB::table('profiles')->select('hobbies3')->where('user_id', '=', Auth::user()->id)->value('hobbies3');
            $hobbies4 = DB::table('profiles')->select('hobbies4')->where('user_id', '=', Auth::user()->id)->value('hobbies4');
            $hobbies5 = DB::table('profiles')->select('hobbies5')->where('user_id', '=', Auth::user()->id)->value('hobbies5');

            $interest = DB::table('profiles')->select('interest1')->where('user_id', '=', Auth::user()->id)->value('interest');
            $interest2 = DB::table('profiles')->select('interest2')->where('user_id', '=', Auth::user()->id)->value('interest2');
            $interest3 = DB::table('profiles')->select('interest3')->where('user_id', '=', Auth::user()->id)->value('interest3');
            $interest4 = DB::table('profiles')->select('interest4')->where('user_id', '=', Auth::user()->id)->value('interest4');
            $interest5 = DB::table('profiles')->select('interest5')->where('user_id', '=', Auth::user()->id)->value('interest5');

            $language = DB::table('profiles')->select('language1')->where('user_id', '=', Auth::user()->id)->value('language');
            $language2 = DB::table('profiles')->select('language2')->where('user_id', '=', Auth::user()->id)->value('language2');
            $language3 = DB::table('profiles')->select('language3')->where('user_id', '=', Auth::user()->id)->value('language3');
            $language4 = DB::table('profiles')->select('language4')->where('user_id', '=', Auth::user()->id)->value('language4');
            $language5 = DB::table('profiles')->select('language5')->where('user_id', '=', Auth::user()->id)->value('language5');


            $smoking = DB::table('preferences')->select('smoking')->where('id', '=', 1)->value('smoking');


            ?>






            <!-- About me input -->



















                <!-- smoking  -->
                <div class="form-group{{ $errors->has('smoking') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Smoking</label>

                    <!-- smoking -->
                    <div class="col-md-3">

                        <select class="form-control" name="smoking" >
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



                <!-- ethnicity  -->


                <div class="form-group{{ $errors->has('Ethnicity') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Ethnicity/Background</label>

                    <div class="col-md-3">


                        <div class="checkbox">
                            <label><input type="checkbox" id='caucasian' name="caucasian" value="1" onchange="ethnicity()" {{ $ethnCaucasian === 1 ? 'checked' : '' }}>White/Caucasian</label>
                            <input id='caucasianHidden' type='hidden' value='0' name='caucasian'>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" id="hispanic" name="hispanic" value="1" onchange="ethnicity()" {{ $ethnHispanic === 1 ? 'checked' : '' }}>Hispanic/Latino</label>
                            <input id='hispanicHidden' type='hidden' value='0' name='hispanic'>


                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" id="black" name="black" value="1" onchange="ethnicity()" {{ $ethnBlack === 1 ? 'checked' : '' }}>Black/African</label>
                            <input id='blackHidden' type='hidden' value='0' name='black'>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" id="middleeast" name="middleeast" value="1" onchange="ethnicity()" {{ $ethnMiddleeastern === 1 ? 'checked' : '' }}>Middle Eastern</label>
                            <input id='middleeastHidden' type='hidden' value='0' name='middleeast'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="asian" name="asian" value="1" onchange="ethnicity()" {{ $ethnAsian === 1 ? 'checked' : '' }}>Asian</label>
                            <input id='asianHidden' type='hidden' value='0' name='asian'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="indian" name="indian" value="1" onchange="ethnicity()" {{ $ethnIndian === 1 ? 'checked' : '' }}>Indian</label>
                            <input id='indianHidden' type='hidden' value='0' name='indian'>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" id="aboriginal" name="aboriginal" value="1" onchange="ethnicity()" {{ $ethnAboriginal === 1 ? 'checked' : '' }}>Aboriginal</label>
                            <input id='aboriginalHidden' type='hidden' value='0' name='aboriginal'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="islander" name="islander" value="1" onchange="ethnicity()" {{ $ethnIslander === 1 ? 'checked' : '' }}>Other Islander</label>
                            <input id='islanderHidden' type='hidden' value='0' name='islander'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="mixed" name="mixed" value="1" onchange="ethnicity()" {{ $ethnMixedrace === 1 ? 'checked' : '' }}>Mixed Race</label>
                            <input id='mixedHidden' type='hidden' value='0' name='mixed'>
                        </div>


                        {{--<div class="checkbox">--}}
                            {{--<label><input type="checkbox" id="other" name="other" value="1" onchange="ethnicity()" {{ $ethnOther === 1 ? 'checked' : '' }}>Other</label>--}}
                            {{--<input id='otherHidden' type='hidden' value='0' name='other'>--}}
                        {{--</div>--}}




                    </div>
                </div>




                <!-- religion  -->


                <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Religion</label>

                    <div class="col-md-3">



                        <div class="checkbox">
                            <label><input type="checkbox" id="hinduism" name="hinduism" value="1" onchange="religion()" {{ $ethnHinduism === 1 ? 'checked' : '' }}>Hinduism</label>
                            <input id='hinduismHidden' type='hidden' value='0' name='hinduism'>


                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" id="chirstian" name="chirstian" value="1" onchange="religion()" {{ $ethnChirstian === 1 ? 'checked' : '' }}>Chirstian</label>
                            <input id='chirstianHidden' type='hidden' value='0' name='chirstian'>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" id="judaism" name="judaism" value="1" onchange="religion()" {{ $ethnJudaism === 1 ? 'checked' : '' }}>Judaism</label>
                            <input id='judaismHidden' type='hidden' value='0' name='judaism'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="buddhism" name="buddhism" value="1" onchange="religion()" {{ $ethnBuddhism === 1 ? 'checked' : '' }}>Buddhism</label>
                            <input id='buddhismHidden' type='hidden' value='0' name='buddhism'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="atheist" name="atheist" value="1" onchange="religion()" {{ $atheistAtheist === 1 ? 'checked' : '' }}>Atheist</label>
                            <input id='atheistHidden' type='hidden' value='0' name='atheist'>
                        </div>





                    </div>
                </div>





                <!-- language  -->



                <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Languages</label>

                    <div class="col-md-3">



                        <div class="checkbox">
                            <label><input type="checkbox" id="english" name="english" value="1" onchange="language()" {{ $ethnEnglish === 1 ? 'checked' : '' }}>English</label>
                            <input id='englishHidden' type='hidden' value='0' name='english'>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" id="french" name="french" value="1" onchange="language()" {{ $ethnFrench === 1 ? 'checked' : '' }}>French</label>
                            <input id='frenchHidden' type='hidden' value='0' name='french'>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" id="spanish" name="spanish" value="1" onchange="language()" {{ $ethnSpanish === 1 ? 'checked' : '' }}>Spanish</label>
                            <input id='spanishHidden' type='hidden' value='0' name='spanish'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="chinese" name="chinese" value="1" onchange="language()" {{ $ethnChinese === 1 ? 'checked' : '' }}>Chinese</label>
                            <input id='chineseHidden' type='hidden' value='0' name='chinese'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="hindi" name="hindi" value="1" onchange="language()" {{ $atheistHindi === 1 ? 'checked' : '' }}>Hindi</label>
                            <input id='hindiHidden' type='hidden' value='0' name='hindi'>
                        </div>

                        <div class="checkbox">
                        <label><input type="checkbox" id="arabic" name="arabic" value="1" onchange="language()" {{ $atheistArabic === 1 ? 'checked' : '' }}>Arabic</label>
                        <input id='arabicHidden' type='hidden' value='0' name='arabic'>
                        </div>


                    <div class="checkbox">
                    <label><input type="checkbox" id="persian" name="persian" value="1" onchange="language()" {{ $atheistPersian === 1 ? 'checked' : '' }}>Persian</label>
                    <input id='persianHidden' type='hidden' value='0' name='persian'>
                    </div>

                    <div class="checkbox">
                    <label><input type="checkbox" id="urdu" name="urdu" value="1" onchange="language()" {{ $atheistUrdu === 1 ? 'checked' : '' }}>Urdu</label>
                    <input id='urduHidden' type='hidden' value='0' name='urdu'>
                    </div>





                    </div>
                </div>





                <!-- Interest  -->




                <div class="form-group{{ $errors->has('interest') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Interest</label>

                    <div class="col-md-3">



                        <div class="checkbox">
                            <label><input type="checkbox" id="tech" name="tech" value="1" onchange="interest()" {{ $ethnTech === 1 ? 'checked' : '' }}>Tech</label>
                            <input id='techHidden' type='hidden' value='0' name='tech'>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" id="science" name="science" value="1" onchange="interest()" {{ $ethnScience === 1 ? 'checked' : '' }}>Science</label>
                            <input id='scienceHidden' type='hidden' value='0' name='science'>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" id="art" name="art" value="1" onchange="interest()" {{ $ethnArt === 1 ? 'checked' : '' }}>Art</label>
                            <input id='artHidden' type='hidden' value='0' name='art'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="history" name="history" value="1" onchange="interest()" {{ $ethnHistory === 1 ? 'checked' : '' }}>History</label>
                            <input id='historyHidden' type='hidden' value='0' name='history'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="sports" name="sports" value="1" onchange="interest()" {{ $ethnSports === 1 ? 'checked' : '' }}>Sports</label>
                            <input id='sportsHidden' type='hidden' value='0' name='sports'>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="literature" name="literature" value="1" onchange="interest()" {{ $ethnLiterature === 1 ? 'checked' : '' }}>Literature</label>
                            <input id='literatureHidden' type='hidden' value='0' name='literature'>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" id="traveling" name="traveling" value="1" onchange="interest()" {{ $ethnTraveling === 1 ? 'checked' : '' }}>Traveling</label>
                            <input id='travelingHidden' type='hidden' value='0' name='traveling'>
                        </div>

                    </div>
                </div>













                <!--

                **Submit
                **Button


                 -->




                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>













        </div>
    </div>
</div>


</body>




<script src="{{ asset('js/app.js') }}"></script>




