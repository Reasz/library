@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Book'])
    <div class="container-fluid py-4">
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
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
        </div>
    </div>

    <div>
       
                    Comments

    </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
