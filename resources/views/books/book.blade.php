@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books'])
    <div class="container-fluid py-4">
        <div class="row">
                <div class="col-md-16 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                        </div>
                        
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

                        <div class="card-footer pb-0 px-3">
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-16 mt-4">
                <div class="card">
                    <form method="POST" action="/books-{{ $book->id }}-comments">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="type..."></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn" type="submit">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @foreach ($book->comments as $comment)
        <x-book-comment :comment="$comment" />
    @endforeach
    
    
    
@endsection
