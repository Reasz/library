@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <x-card> 
        
        <h5>{{ $book->title }}</h5>

        <x-succes-message />

        <p>
            @foreach($book->authors as $author)
                {{ $author->name }}, 
            @endforeach
        </p>
        <p>Number of copies: {{ $book->number_of_copies }}</p>
        <p>Rented copies: {{ $book->rented_copies }}</p>

        @if (($book->number_of_copies - $book->rented_copies) > 0)
            <p>Available copies: {{ $book->number_of_copies - $book->rented_copies }}</p>
            <form method="POST" action="{{ route('rent-post', $book->id) }}">
                @csrf
                <div class="row p-4">
                    <input class="form-control" type="text" id="user_id" name="user_id" >
                    <x-form.error name="user_id" />
                    
                    <input type="text" id="book_id" name="book_id" value="{{ $book->id }}" hidden >
                    <x-form.error name="book_id" />

                    <div class="form-group">
                        <label for="start_time" class="form-control-label">Start time</label>
                        <input class="form-control" type="datetime-local" value="{{ now()->format('Y-m-d') }}T{{ now()->format('H:i') }}" id="start_time" name="start_time">
                        <x-form.error name="start_time" />
                    </div>

                    <div class="form-group">
                        <label for="end_time" class="form-control-label">End time</label>
                        <input class="form-control" type="datetime-local" value="{{ now()->modify("+1 days")->format('Y-m-d') }}T{{ now()->format('H:i') }}" id="end_time" name="end_time">
                        <x-form.error name="end_time" />
                    </div>
                    
                    <x-form.input name="number_of_copies" type="number" value="1" name="number_of_copies"/>
                    <x-form.submit-button> Rent </x-form.submit-button>
                </div>
            </form>
        @else
            No available copy for rent.
        @endif
 
    </x-card> 

       
@endsection