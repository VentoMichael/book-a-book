<div>
    @foreach(range('A','Z') as $i)
        <a href="#{{$i}}">{{$i++}}</a>
    @endforeach
</div>
