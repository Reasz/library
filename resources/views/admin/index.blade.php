@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <x-card> 
        <div class="card">
            <div class="table-responsive">
                @if($rents->count() > 0 )
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Authors</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of copies</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Return</th>
                              <th class="text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                        <tbody>
                            @foreach($rents as $rent)
                                <tr>
                                    <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">
                                            <a href="{{ route('book', $rent->book->id) }}">
                                                {{ $rent->book->title }}
                                            </a>
                                        </h6>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        @foreach($rent->book->authors as $author)
                                            {{ $author->name }}, 
                                        @endforeach
                                    </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $rent->user->id }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $rent->user->username }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $rent->number_of_copies }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <form method="POST" action="{{ route('rent-giveback', $rent->id) }}">
                                            @csrf
                                            @method('DELETE')
    
                                            <button class="btn text-xs">
                                                Give back
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                
                        </tbody>
                    </table>
                @else
                    <p> No rented books. </p>
                @endif
            </div>
          </div>
          {{ $rents->links() }}
    </x-card> 

       
@endsection