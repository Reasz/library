@auth
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-16 mt-4">
                    <div class="card">
                        <form method="POST" action="/books-{{ $book->id }}-comments">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea name="comment" class="form-control"
                                id="exampleFormControlTextarea1" rows="3" 
                                placeholder="type..." required></textarea>
                                @error('comment')
                                    <span class="text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn" type="submit">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endauth