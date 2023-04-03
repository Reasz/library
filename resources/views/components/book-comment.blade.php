@props(['comment'])

<div class="container-fluid py-1">
    <div class="row">
        <div class="col-md-16 mt-4">
            <div class="card">
                <div class="container">
                    <div> 
                        <header>
                            <h6 class="">{{ $comment->user->username }}</h6>
                            <p class="text-xs">
                                posted
                                <time> {{ $comment->created_at->format('F j, Y, g:i a') }} </time>
                            </p>
                        </header>

                        <p>
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>