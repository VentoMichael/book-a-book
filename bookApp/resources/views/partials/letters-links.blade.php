<div>
    @if(route('users.index'))
        @php
            $firstLetters = $students->pluck('first_letter_of_name')->unique();
        @endphp
        @foreach($firstLetters as $i)
            <a href="#{{$i}}">{{$i++}}</a>
        @endforeach
    @endif
    @if(route('books.index'))
        @php
            $firstLettersBook = $books->pluck('first_letter_of_book')->unique();
        @endphp

        @foreach($firstLettersBook as $i)
            <a href="#{{$i}}">{{$i++}}</a>
        @endforeach
    @endif
</div>
