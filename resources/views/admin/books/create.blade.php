@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <x-card> 
        <form method="POST" action="admin-books">
            @csrf
            <div class="row p-4">
                <x-form.input name="title" />
                <x-form.input name="author" />
                <x-form.input name="placement" />
                <x-form.input name="isbn" type="number"/>
                <x-form.input name="edition" type="number"/>
                <x-form.input name="number_of_copies" type="number"/>

                @php
                    $genres = \App\Models\Genre::all();
                @endphp
                <x-form.select-multiple name="genres" :elements="$genres" />

                <x-form.textarea name="summary" />

                <x-form.submit-button> Add </x-form.submit-button>
            </div>
        </form>
    </x-card> 

       
@endsection