@auth
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-16 mt-4">
                    <div class="card p-4">
                        <form method="POST" action="/books-{{ $book->id }}-comments">
                            @csrf

                            <x-form.textarea name="comment" />

                            <x-form.submit-button> Post </x-form.submit-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endauth