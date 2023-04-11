@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <x-card> 
        <x-succes-message />

        <form method="POST" action="{{ route('admin-add-author') }}">
            @csrf
            <div class="row p-4">
                <x-form.input name="name" />
                <div class="row"> 
                    <x-form.submit-button> Add </x-form.submit-button>
                    <a href="{{ route('admin-book-create') }}">new book</a>
                </div>
            </div>
        </form>
    </x-card> 

       
@endsection