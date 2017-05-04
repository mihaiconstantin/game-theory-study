{{--end of experiment--}}

<div class="instruction-box">
    @include('partials.elements.__description')

    <div class="card">
        <h3 class="card-header text-muted">Your participation code is:</h3>
        <div class="card-block text-center ">
            <h4 class="card-title">{{session('storage.data_participants.code')}}</h4>
            <p class="card-text text-danger"><strong>Place this code into Amazon M-Turk to validate your participation.</strong></p>
            <a href="http://www.google.com" target="_blank" id="finish" class="btn btn-primary">Go now</a>
        </div>
    </div>

</div>