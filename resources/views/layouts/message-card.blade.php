<a class="msg-cardlink" href="{{route('loadmsg', ['rid' => $prospect->id])}}">
<div class="msg-card text-center">


    <img class="img-center" src="{{asset('img/avatar/'.$prospect->avatar)}}">
    <br>

    <strong class="">{{$prospect->firstname}} {{$prospect->lastname}}</strong>

</div>
</a>
<br>
