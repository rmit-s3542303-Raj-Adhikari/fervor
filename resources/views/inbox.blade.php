@extends('layouts.app')
@section('title', ' - Inbox')
@section('content')
    <div class="row msg-container">

        <!-- Message Sidebar -->
        <div class="col-xs-4 col-md-2 msg-sidebar">
            @php

                $matches = \App\Http\Controllers\MatchesController::returnMatches(Auth::id());
                $pinned  = $matches['pinned'];
                $filtered  = $matches['filtered'];

            @endphp


            <h3 class="text-center">Pinned</h3>
            @foreach($pinned as $match)
                @php
                    $prospect = \App\User::find($match[0]->prospect);;
                @endphp

                @include('layouts.message-card')
            @endforeach

            <h3 class="text-center">Matches</h3>
            @foreach($filtered as $match)
                @php
                    $prospect = \App\User::find($match[0]->prospect);;
                @endphp

                @include('layouts.message-card')
            @endforeach
        </div>
        <!-- Message Window & Form -->
        <div class="col-xs-8 col-md-10 msg-chatbox">
            message form
        </div>
    </div>
@endsection
