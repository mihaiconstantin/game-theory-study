{{--opponent-evaluation from--}}


<div class="instruction-box">
    @include('partials.elements.__description')
</div>

<form action="{{URL::route('form.store-opponent-evaluation')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_questionnaire" value="{{$name}}">
    <input type="hidden" name="_game_number" value="{{$gameNumber}}">

    @include('macros.input')

    @include('partials.elements.__submit')
</form>


