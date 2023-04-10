@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books'])
    <x-card>         
        <div class="container">
                           
            <p>   
                {{ $book->title }}
            </p>

            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <tbody>
                        <tr>
                            <td>
                                @if($book->checkFavorites())
                                    <form method="POST" action="favorites-{{ $favorite->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn">
                                            <i class="ni ni-favourite-28"></i>
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="favorites">
                                        @csrf
                                            <input type="text" id="user_id" name="user_id" value="{{ auth()->user()->id }}" hidden >
                                            <input type="text" id="book_id" name="book_id" value="{{ $book->id }}" hidden >
                                            <button class="btn btn-primary" type="submit"> <i class="ni ni-favourite-28"></i> </button>
                                        
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if($book->checkRead())
                                    <form method="POST" action="reads-{{ $read->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn">
                                            <i class="ni ni-books"></i>
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="reads">
                                        @csrf
                                            <input type="text" id="user_id" name="user_id" value="{{ auth()->user()->id }}" hidden >
                                            <input type="text" id="book_id" name="book_id" value="{{ $book->id }}" hidden >
                                            <button class="btn btn-primary" type="submit"> <i class="ni ni-books"></i> </button>
                                        
                                    </form>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>   
                <b>Authors:</b> 
                @foreach($book->authors as $author)
                    @if ($loop->last)
                        {{ $author->name }}
                        @break
                    @endif
                    {{ $author->name }},
                @endforeach
            </p>

            <p>   
                <b>Genres:</b> 
                @foreach($book->genres as $genre)
                    @if ($loop->last)
                        {{ $genre->name }}
                        @break
                    @endif
                    {{ $genre->name }},
                @endforeach
            </p>

            <p>   
                <b>Edition:</b> {{ $book->edition }}
            </p>

            <p>   
                {{ $book->summary }}
            </p>

            <p>   
                <b>Placement:</b>  {{ $book->placement }}
            </p>

            <p>   
                <b>ISBN:</b>  {{ $book->isbn }}
            </p>

            <p>   
                <b>Number of copies:</b>  {{ $book->number_of_copies }}
            </p>

            <p>   
                <b>Rented copies:</b>  {{ $book->rented_copies }}
            </p>
         
        </div>
        
    </x-card>

    @include ('books._add-comment-form')
        
    @foreach ($book->comments as $comment)
        <x-book-comment :comment="$comment" />
    @endforeach

@endsection
