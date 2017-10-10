<div class="container">
    <div class="row">

        <!-- Pin button -->
        <div class='col-md-2'>
            <div class="" style="height:240px">
                <strong> {!! $match[0]->pinned !!}</strong>
                <form action="{{ route("submitMatch") }}" method="post">
                    {{ csrf_field() }}
                    <input hidden name="match" value="{!!$match[0]->id!!}">
                    <input hidden name="action" value="pin">
                    <button type="submit"
                            class="btn btn-{{ ($match[0]->pinned) ? "danger" : "primary"}} btn-xs pull-right">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Match card-->
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class='col-lg-12'>
                        <strong> {!! $match[0]->active !!}</strong>
                        <!-- Dismiss button -->
                        <form action="{{ route("submitMatch") }}" method="post">
                            {{ csrf_field() }}
                            <input hidden name="match" value="{!!$match[0]->id!!}">
                            <input hidden name="action" value="dismiss">
                            <button type="submit" class="btn btn-danger btn-xs pull-right">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </form>

                    </div>
                    <br>
                    <div class="row">
                        <!-- User Avatar -->
                        <div class="col-xs-3">
                            <a href="#" class="img-thumbnail img-responsive">
                                <img src="{{asset("/img/avatar/".$prospect->avatar)}}"
                                     style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            </a>
                        </div>
                        <!-- Names -->
                        <div class="col-xs-4 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>{!! $prospect->firstname !!} {!! $prospect->lastname !!} </h3>
                                </div>
                            </div>
                            <hr>
                            <!-- Location and Age -->

                            <div class="row">
                                <div class="col-xs-8">
                                    <label>Location</label>
                                    <p>{!! $profile->location !!} (Suburb - State) </p>
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
                                <h4 class="text-center"> Match ({!! $match[0]->score !!})</h4>
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
                </div>
            </div>
        </div>
    </div>
</div>