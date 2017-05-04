{{--end of experiment--}}

<div class="instruction-box">
    @include('partials.elements.__description')

    <div class="card">
        <h3 class="card-header text-muted">Your participation code is:</h3>
        <div class="card-block text-center ">

            @if($code)

                <h4 class="card-title">{{$code}}</h4>
                <p class="card-text text-danger"><strong>Place this code into Amazon M-Turk to validate your participation.</strong></p>
                <a href="http://www.google.com" target="_blank" id="finish" class="btn btn-primary">Go now</a>

            @else

                <h4 class="card-title text-danger">No valid participation identified.</h4>
                <p class="card-text text-danger">If you think this message is a mistake, please contact our test leader in order to clarify the situation.</p>

            @endif

        </div>
    </div>

</div>