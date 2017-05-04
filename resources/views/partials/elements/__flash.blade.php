@if($flash = session('message'))

    <div id="flash-message" class="alert alert-danger" role="alert">
        <strong>{{$flash}}</strong>
    </div>

@endif