<div class="row" style="padding-top: 10px;">

    @php
        $rec =   \App\User::find($rid)

    @endphp

    <div class="well well-sm col-md-8 col-md-offset-2 text-center"> <strong style="font-size: 20px">{!! $rec->firstname . ' ' . $rec->lastname !!}</strong></div>

</div>

<div class="row posts" style="height: calc(100vh - 373px);overflow: scroll;">
    <div class="col-md-12" style="overflow: scroll;">

    @foreach($posts as $post)
        @if($post->user_id == Auth::id())
            @include('layouts.message-sent')
        @else
            @include('layouts.message-rec')
        @endif
    @endforeach
            </div>
</div>
<div class="" style="height: 200px;">
    <div class="col-md-10 col-xs-7" style="height: 100%;">
        <form action="{{ route('post.create')}}" method="post" style="height: 100%;">
            <div class="form-group" style="height: 100%;">
                <input name="rec" value="{{$rid}}" hidden>
                <textarea class="form-control" name="body" id="new-post" placeholder="enter your message" style="height: 100%; ">
                </textarea>
            </div>

            <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
    </div>
    <div class="col-md-2 col-xs-5" style="height: 100%">
        <button type="submit" class="btn btn-primary btn-block" style="height: 100%"> <h3><strong>Send</strong></h3></button>
    </div>
</div>
<br>
<script>
    var token = '{{ Session::token() }}'
</script>