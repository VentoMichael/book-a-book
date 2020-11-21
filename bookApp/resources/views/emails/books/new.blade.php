@component('mail::message')
# Un nouveau livre est dans le marché

{{$book->title}} vient d'étre créer !

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/books'])
Je viens voir
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
