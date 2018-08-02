{{--expectation from--}}

<div class="instruction-box">
    @include('partials.elements.__description')
</div>

<form action="{{URL::route('form.store-feedback')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include('macros.input')

    @include('partials.elements.__submit')
</form>