@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <x-card>
        <div style="display:flex; align-items:center; space-between:space-evenly;">
            <x-books-search />
        </div>

        <div class="card">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-xs">
                                    <a href="{{ route('book', $book->id) }}">
                                        {{ $book->title }}
                                    </a>
                                </h6>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-xs font-weight-bold mb-0">
                                @foreach($book->authors as $author)
                                    @if ($loop->last)
                                        {{ $author->name }}
                                        @break
                                    @endif
                                    {{ $author->name }}, 
                                @endforeach
                            </p>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('rent', $book->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Rent book">
                                    Rent
                                </a>
                            </td>
                            @superadmin
                                <td class="align-middle">
                                    <a href="{{ route('admin-book-edit', $book->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit book">
                                        Edit
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <form method="POST" action="{{ route('admin-book-delete', $book->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn text-xs">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            @endsuperadmin
                        </tr>
                    @endforeach
          
                </tbody>
              </table>
            </div>
          </div>
          {{ $books->links() }}
    </x-card> 

       
@endsection