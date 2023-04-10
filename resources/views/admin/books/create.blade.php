@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <x-card> 
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"> {{ session('success') }} </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form method="POST" action="admin-books">
            @csrf
            <div class="row p-4">
                @php
                    $authors = \App\Models\Author::orderBy('name', 'asc')->get();
                @endphp
                <x-form.select-multiple name="authors" :elements="$authors" />
                <a class="h6" href="admin-author-create">new author</a>
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