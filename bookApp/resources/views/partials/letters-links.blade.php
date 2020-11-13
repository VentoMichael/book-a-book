<div class="hidden inline-block fixed right-0 lettersContainer mr-2 text-center">
    @if(\Request::route()->getName() === 'users.index')
        @php
            $firstLetters = $users->pluck('first_letter_of_name')->unique();
        @endphp
        <ul>
            @foreach($firstLetters as $i)
                <li>
                    <a class="text-xl letterLink" href="#{{$i}}">{{$i++}}</a>
                </li>
            @endforeach
        </ul>
    @endif
    @if(\Request::route()->getName() === 'books.index')
        @php
            $firstLettersBook = $books->pluck('first_letter_of_book')->unique();
        @endphp
        <ul>
            @foreach($firstLettersBook as $i)
                <li class="text-xl letterLink">
                    <a href="#{{$i}}">{{$i++}}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
