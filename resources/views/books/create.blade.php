@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Books']) 

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-16 mt-4">
                <div class="card">
                    <form method="POST" action="admin-books">
                        @csrf
                        <div class="row p-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" value="{{ old('title') }}" class="form-control" id="title" name="title" placeholder="title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" value="{{ old('author') }}" class="form-control" id="author" name="author" placeholder="author" required>
                                </div>
                            </div>

                            <div class="col-md-16">
                                <div class="form-group">
                                    <label for="placement">Placement</label>
                                  <input type="text" value="{{ old('placement') }}" class="form-control" id="placement" name="placement" placeholder="placement" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                  <input type="number" value="{{ old('isbn') }}" class="form-control" id="isbn" name="isbn" placeholder="ISBN" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edition">Edition</label>
                                  <input type="number" value="{{ old('edition') }}" class="form-control" id="edition" name="edition" placeholder="edition" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numberofcopies">Number of copies</label>
                                    <input type="number" value="{{ old('number_of_copies') }}" class="form-control" id="numberofcopies" name="number_of_copies" placeholder="number of copies" required>
                                </div>
                            </div>

                            <div class="col-md-16">
                                <div class="form-group">
                                    <label for="genres">Genres</label>
                                    <select multiple class="form-control" id="genres" name="genres[]" required>
                                        @php
                                            $genres = \App\Models\Genre::all();
                                        @endphp

                                        @foreach ($genres as $genre)
                                            <option 
                                            value="{{ $genre->id }}" {{ old('genres') == $genre->id ? 'selected' : '' }}> 
                                                {{ ucwords($genre->name) }}
                                            </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-16">
                                <div class="form-group">
                                    <label for="summary">Summary</label>
                                    <textarea name="summary" class="form-control"
                                    id="summary" rows="4" 
                                    placeholder="summary" required> {{ old('summary') }} </textarea>
                                    @error('summary')
                                        <span class="text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn" type="submit">Add</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

       
@endsection