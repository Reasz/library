@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <x-card> 
        <div class="card">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <tbody>
                    @foreach($reads as $read)
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-xs">
                                    <a href="books-{{ $read->book->id }}">
                                        {{ $read->book->title }}
                                    </a>
                                </h6>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-xs font-weight-bold mb-0">
                                @foreach($read->book->authors as $author)
                                    @if ($loop->last)
                                        {{ $author->name }}
                                        @break
                                    @endif
                                    {{ $author->name }}, 
                                @endforeach
                            </p>
                            </td>
                            <td class="align-middle">
                                <form method="POST" action="reads-{{ $read->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn text-xs">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          {{ $reads->links() }}
    </x-card> 

       
@endsection