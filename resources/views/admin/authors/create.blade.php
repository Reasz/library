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

        <form method="POST" action="admin-authors">
            @csrf
            <div class="row p-4">
                <x-form.input name="name" />
                <div class="row"> 
                    <x-form.submit-button> Add </x-form.submit-button>
                    <a href="admin-book-create">new book</a>
                </div>
            </div>
        </form>
    </x-card> 

       
@endsection