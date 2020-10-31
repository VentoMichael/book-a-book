<div>
    @if(count($students))
        @php
            $firstLetters = $students->pluck('first_letter_of_name')->unique();
        @endphp
        @foreach($firstLetters as $i)
            <a href="#{{$i}}">{{$i++}}</a>
        @endforeach
    @endif
    @if(count($books))
        @php
            $firstLettersBook = $books->pluck('first_letter_of_book')->unique();
        @endphp

        @foreach($firstLettersBook as $i)
            <a href="#{{$i}}">{{$i++}}</a>
        @endforeach
    @endif
</div>
