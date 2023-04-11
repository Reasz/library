@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <x-card> 
        <x-succes-message />

        <form method="POST" action="{{ route('admin-add-book') }}">
            @csrf
            <div class="row p-4">
                @php
                    $authors = \App\Models\Author::orderBy('name', 'asc')->get();
                @endphp
                <x-form.select-multiple name="authors" :elements="$authors"  />
                <a class="h6" href="{{ route('admin-author-create') }}">new author</a>
                <x-form.input name="title" />
                <x-form.input name="placement" />
                <x-form.input name="isbn" type="number"/>
                <x-form.input name="edition" type="number"/>
                <x-form.input name="number_of_copies" type="number"/>

                @php
                    $genres = \App\Models\Genre::orderBy('name', 'asc')->get();
                @endphp
                <x-form.select-multiple name="genres" :elements="$genres" />

                <x-form.textarea name="summary" />

                <x-form.submit-button> Add </x-form.submit-button>
            </div>
        </form>
    </x-card> 

       
@endsection