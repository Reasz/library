@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books'])
    <div class="container-fluid py-4">
        <div class="row">
                <div class="col-md-7 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Results</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                                
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">
                                                <a href="/books/{{ $book->book_id }}"> Title: {{ $book->title }} </a>
                                            </h6>
                                            <span class="mb-2 text-xs">Author:  </span>
                                        </div>
                                    </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
