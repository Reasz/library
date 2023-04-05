@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books'])
    <x-card> 
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Results</h6>
            
            <div style="display:flex; align-items:center; space-between:space-evenly;">
                <x-genres-dropdown />
                <x-books-search />
            </div>
        </div>
        
        <div class="container">
            @if ($books->count())
                <x-books-grid :books="$books" />

                {{ $books->links() }}
            @else
                <p>No books found.</p>
            @endif
        </div>
    </x-card> 
@endsection
