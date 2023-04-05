@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => ('Edit book ' . $book->title) ]) 

    <x-card> 
        <form method="POST" action="admin-book-{{ $book->id}}">
            @csrf
            @method('PATCH')

            <div class="row p-4">
                <x-form.input name="title" value="{{ $book->title }}"/>
                <x-form.input name="author" />
                <x-form.input name="placement"  value="{{ $book->placement }}"/>
                <x-form.input name="isbn" type="number" value="{{ $book->isbn }}"/>
                <x-form.input name="edition" type="number" value="{{ $book->edition }}"/>
                <x-form.input name="number_of_copies" type="number" value="{{ $book->number_of_copies }}"/>

                @php
                    $genres = \App\Models\Genre::all();
                @endphp
                <x-form.select-multiple name="genres" :elements="$genres" />

                <x-form.textarea name="summary" > {{ old('summary', $book->summary) }} </x-form.textarea>

                <x-form.submit-button> Update </x-form.submit-button>
            </div>
        </form>
    </x-card> 

       
@endsection