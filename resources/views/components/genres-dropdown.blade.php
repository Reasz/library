<div class="dropdown">
     <button class="btn bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        {{ isset($currentGenre) ?ucwords($currentGenre->name) : 'Genres' }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"  style="max-height:10rem; overflow:auto;">
        <li><a class="dropdown-item" href="/books">all</a></li>
        @foreach($genres as $genre)
            <li><a class="dropdown-item" href="?genres={{$genre->id}}&{{ http_build_query(request()->except('genres')) }}">{{ $genre->name }}</a></li>
        @endforeach
    </ul>
</div>