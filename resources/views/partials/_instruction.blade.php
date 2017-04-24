{{--instruction box: same format anywhere--}}

{{--injecting button id to 'partials.elements.__continue'--}}
{{--@section('continue-btn-id', 'test')--}}

<div class="instruction-box {{$visibility}}">
    @include('partials.elements.__description')
    @include('partials.elements.__continue')
</div>