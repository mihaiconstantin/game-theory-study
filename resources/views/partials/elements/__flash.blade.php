@if($flash = session('message'))
    <hr>

    <div id="flash-message" class="alert alert-danger" role="alert">
        {{$flash}}
    </div>

    <hr>
@endif