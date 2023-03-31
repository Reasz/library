@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books'])
    <div class="container-fluid py-4">
        <div class="row">
                <div class="col-md-16 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Results</h6>
                            
                            <x-genres-dropdown />
                        </div>
                        
                        <div class="container">
                            @if ($books->count())
                                <x-books-grid :books="$books" />
                            @else
                                <p>No books found.</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
