@extends('layouts.app')

@section('content')

    <style type="text/css">

    </style>
    <body>
    <section class = "row posts">
        <div class = "col-md-6 col-md-offset-3 "><h3>what other people say....</h3></div>
        <div class = "col-md-6 col-md-offset-3 " style="width: 50%; height: 250px; overflow: scroll;">
            @foreach($posts as $post)
                <article class="post panel panel-success" data-postid="{{ $post->id }}">
                    <div class="info panel-heading" style="margin-left:;">
                        {{ $post->user->name }} {{$post->created_at}}
                    </div>
                    <div class="panel-body" style="margin-left: 20px;">{{ $post->body }}</div>

                </article>
            @endforeach
        </div>
    </section>
    <section class="row new-post">
        <div class =  "col-md-6 col-md-offset-3 ">
            <header>
                <h3>what do you have to say </h3>
            </header>
            <form action="{{ route('post.create')}}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="enter your message">

                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
                <input type="hidden" value = "{{Session::token()}}" name="_token">
            </form>
        </div>
    </section><br>

    </body>

    <script>
        var token = '{{ Session::token() }}'
        </script>
    @endsection