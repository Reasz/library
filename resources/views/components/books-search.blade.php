<div class="ms-md-auto pe-md-3 d-flex align-items-center">
    <form method="GET" action="">
        @if (request('genres'))
            <input type="hidden" name="genres" value="{{ request('genres') }}">
        @endif
            
        <input type="text" name="search" placeholder="search..." 
        class="form-control" value="{{ request('search') }}">
    </form>
</div>