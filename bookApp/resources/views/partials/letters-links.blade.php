<div>
    @php
        $firstLetters = $students->pluck('first_letter_of_name')->unique();
    @endphp
    @foreach($firstLetters as $i)
        <a href="#{{$i}}">{{$i++}}</a>
    @endforeach
</div>
