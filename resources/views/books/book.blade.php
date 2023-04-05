@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books'])
    <x-card>         
        <div class="container">
                           
            <div>   
                {{ $book->title }}
            </div>

            <div>   
                <b>Authors:</b> 
                @foreach($book->authors as $author)
                    {{ $author->name }}
                @endforeach
            </div>

            <div>   
                <b>Genres:</b> 
                @foreach($book->genres as $genre)
                    {{ $genre->name }}
                @endforeach
            </div>

            <div>   
                <b>edition:</b> {{ $book->edition }}
            </div>

            <div>   
                {{ $book->summary }}
            </div>

            <div>   
                <b>placement:</b>  {{ $book->placement }}
            </div>

            <div>   
                <b>isbn:</b>  {{ $book->isbn }}
            </div>

            <div>   
                <b>number of copies:</b>  {{ $book->number_of_copies }}
            </div>

            <div>   
                <b>rented copies:</b>  {{ $book->rented_copies }}
            </div>
         
        </div>
        
    </x-card>

    @include ('books._add-comment-form')
        
    @foreach ($book->comments as $comment)
        <x-book-comment :comment="$comment" />
    @endforeach

@endsection
