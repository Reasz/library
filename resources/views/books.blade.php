@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books'])
    <div class="container-fluid py-4">
        <div class="row">
                <div class="col-md-16 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Results</h6>
                        </div>
                        <div class="container">
                            <div class="row">
                                @foreach ($books as $book)
                                    <div class="card" style="width: 18rem; margin: 1rem;">
                                        <h5>
                                            <a href="/{{ $book->id }}">{{ $book->title }} </a>
                                        </h5>
                                        <div class="text-muted small">
                                            @foreach ($book->authors as $author)
                                                {{ $author->name }},
                                            @endforeach
                                        </div>
                                        
                                        @foreach ($book->genres as $genre)
                                            <a href="#" class="badge badge-default" style="color:#000;">
                                                {{ $genre->name }}
                                            </a>
                                        @endforeach
                                        
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <!--
                            <ul class="list-group">
                                @foreach ($books as $book)
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">
                                                <a href="/{{ $book->id }}">{{ $book->title }} </a>
                                            </h6>
                                            
                                            <span class="mb-2 text-xs">
                                                @foreach ($book->authors as $author)
                                                    {{ $author->name }},
                                                @endforeach
                                            </span>
                                            
                                            <span class="mb-2 text-xs">
                                                @foreach ($book->genres as $genre)
                                                    {{ $genre->name }},
                                                @endforeach
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
