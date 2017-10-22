<div class="container">
    <div class="row">
        <!-- Match card-->
        <div class="col-md-12" style="sha">
            <div class="panel panel-default">
                <div class="panel-body">

                    <br>
                    <div class="row">
                        <!-- User Avatar -->
                        <div class="col-xs-3">
                            <a href="javascript:{}"
                               onclick="document.getElementById('p{{$prospect->id}}').submit(); return false;"
                               class="img-thumbnail img-responsive">
                                <img src="{{asset("/img/avatar/".$prospect->avatar)}}"
                                     style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            </a>
                        </div>
                        <!-- Names -->
                        <div class="col-xs-4 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="p{{$prospect->id}}" action="{{ url("/matchprofile") }}" method="post">
                                        {{ csrf_field() }}
                                        <h3><a href="javascript:{}"
                                               onclick="document.getElementById('p{{$prospect->id}}').submit(); return false;">{!! $prospect->firstname !!} {!! $prospect->lastname !!} </a>
                                        </h3>
                                        <input hidden name="MatchProfileWantToSee" value="{!! $prospect->id !!}">
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <!-- Location and Age -->

                            <div class="row">
                                <div class="col-xs-8">
                                    <label>Location</label>
                                    <p>{!! $profile->location !!} </p>
                                </div>
                                <div class="col-xs-4">
                                    <label>Age</label>
                                    <p>{!! $age->y !!} </p>
                                </div>
                            </div>
                        </div>

                        <!-- Match Score -->
                        <div class="col-xs-2">
                            <div class="compatibility">
                                <h4 class="text-center"> Match</h4>
                                <h1 class="text-success text-center">
                                    <strong>{!! round($match[0]->score/75, 2) * 100 !!}%
                                    </strong></h1>

                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="compatibility">
                                <h4 class="text-center"> Compatibility</h4>
                                <h1 class="text-success text-center">
                                    <strong> {!! round($match[1]*100,2) !!}% </strong></h1>

                            </div>
                        </div>
                    </div>

                    <div class='col-lg-12 text-center '>
                        <div class="row btn-group">
                            <button onclick="document.getElementById('pin{{$prospect->id}}').submit(); return false;"
                                    class="btn btn-{{ ($match[0]->pinned) ? "danger" : "default"}}">
                                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            </button>
                            <button onclick="document.getElementById('msg{{$prospect->id}}').submit(); return false;"
                                    type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </button>
                            <button onclick="document.getElementById('del{{$prospect->id}}').submit(); return false;"
                                    class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>

                        </div>
                        <form action="{{route('loadmsg', ['rid' => $prospect->id])}}"
                              id="{!! 'msg' . $prospect->id !!}">
                            {{ csrf_field() }}
                        </form>


                        <form action="{{ route("submitMatch") }}" method="post" id="{!! 'del' . $prospect->id !!}">
                            {{ csrf_field() }}
                            <input hidden name="match" value="{!!$match[0]->id!!}">
                            <input hidden name="action" value="dismiss">
                        </form>

                        <form action="{{ route("submitMatch") }}" method="post" id="{!! 'pin' . $prospect->id !!}">
                            {{ csrf_field() }}
                            <input hidden name="match" value="{!!$match[0]->id!!}">
                            <input hidden name="action" value="pin">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>