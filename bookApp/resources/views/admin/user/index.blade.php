<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div>
    <h1>
        <img src="{{asset('svg/logo.svg')}}" alt="Book a book application">
    </h1>
    <label for="search" class="search">Search the site:</label>
    <input type="search" id="search" name="search"
           aria-label="Search through site content">
</div>
<nav>
    <h2 class="hidden">
        Principal navigation
    </h2>
    <ul>
        <li>Étudiants</li>
        <li>Livres</li>
        <li>Achats</li>
    </ul>
</nav>

@foreach($users as $user)
<section>
    <h2>
        {{$user->name}} {{$user->surname}}
    </h2>
    <div>
        <div>
            <span class="{{asset('svg/book.svg')}}"></span>
            <p>Numero de livre commandé</p>
        </div>
        <div>
            <span class="{{asset('svg/group.svg')}}"></span>
            <p>{{$user->group}}</p>
        </div>
        <div>
            {{$user->defaultPictureUser($user)}}
        </div>
    </div>
</section>
<div>
    @foreach(range('A','Z') as $i)
        <span>{{$i++}}</span>
    @endforeach
</div>
</body>
</html>
