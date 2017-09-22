@extends('layouts.app')
@section('title', ' - Matches')
@section('content')


    @if(isset($debug))
    <div class='row'>
        <div class="col-lg-6 col-xs-offset-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Debug
                </div>
                <div class="panel-content">
                    <ul>

                        @foreach($debug as $message)
                            <li>{{$message}}</li>
                        @endforeach
                    </ul>


                </div>
            </div>
        </div>
        </div>

    @endif

    <div class="container">
        <div class="row">   
            <div class='col-md-2'>
            <div class="" style="height:240px">
                <a href="#" class="btn btn-default btn-lg" style='width:100%;height:100%'>
                <span class="glyphicon glyphicon-heart vcenter" aria-hidden="true"></span>
                </a>
                
                </div>
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">

                    <div class="panel-body">
                            <div class='col-lg-12'>
                                <button type="button" class="btn btn-danger btn-xs pull-right">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-3">
                                <a href="#" class="img-thumbnail img-responsive">
                                    <img src="150.png" alt="">
                                </a>
                            </div>
                            <div class="col-xs-4 ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>First Name - Age</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label>Location</label>
                                        <p>Melbourne - VIC</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="compatibility">

                                    <h4 class="text-center"> Match</h4>
                                    <h1 class="text-success text-center"><strong>70%</strong></h1>

                                </div>
                            </div>

                            <div class="col-xs-2">
                                <div class="compatibility">

                                    <h4 class="text-center"> Compatibility</h4>
                                    <h1 class="text-success text-center"><strong>50%</strong></h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
@endsection

