@props(['books'])

<div class="row bg-gray-100">
    @foreach ($books as $book)
        <div class="card" style="width: 25rem; margin: 1rem;">

            <span class="badge bg-gradient-warning">
                <a href="/books-{{ $book->id }}">{{ $book->title }} </a>
            </span>

            <div class="text-muted small">
                @foreach ($book->authors as $author)
                    {{ $author->name }},
                @endforeach
            </div>
            
            <div class="container">
                <div class="row">
                    @foreach ($book->genres as $genre)
                        <div class="col-sm">
                            <a href="?genres={{$genre->id}}">    
                                <span class="badge bg-gradient-secondary">
                                    {{ $genre->name }}
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>