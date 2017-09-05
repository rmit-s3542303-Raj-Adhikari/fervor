@extends('layouts.app')
@section('title', ' - Matches')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <button type="button" class="btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-lg pull-right">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#" class="img-thumbnail img-responsive">
                                <img src="150.png" alt="">
                            </a>
                        </div>
                        <div class="col-xs-6 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>First Name - Age</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Location</label>
                                    <p>Location</p>
                                </div>
                                <div class="col-xs-6">
                                    <label>Location</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
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

