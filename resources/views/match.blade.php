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

    <!-- Pinned -->
    <div class="container">
        <h1>Pinned </h1>
    </div>

    @foreach($pinned as $match)
        @php
            $prospect = \App\User::find($match[0]->prospect);
            $profile =  \App\Profile::find($match[0]->prospect);

            $dob = new DateTime(date($prospect->dob));
            $now = new DateTime(date("Y-m-d"));
            $age = $dob->diff($now);
        @endphp
        @include('layouts.matchcard')
    @endforeach

    <!-- Matches -->
    <div class="container">
        <h1>Matches </h1>
    </div>
    @foreach($matches as $match)
        @php
            $prospect = \App\User::find($match[0]->prospect);
            $profile =  \App\Profile::find($match[0]->prospect);

            $dob = new DateTime(date($prospect->dob));
            $now = new DateTime(date("Y-m-d"));
            $age = $dob->diff($now);
        @endphp
        @include('layouts.matchcard')
    @endforeach
@endsection

