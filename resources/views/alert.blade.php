@if (session('status'))
    <div class="alert alert-{{$type}}">
        {{ session('status') }}
    </div>
@endif
