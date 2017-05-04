{{--Personality questionaire determined on route parameter--}}

<form action="{{URL::route('form.storeGameQuestion')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_questionnaire" value="{{$name}}">
    <input type="hidden" name="_game_number" value="{{$gameNumber}}">

    @include('macros.questionnaire')

    @include('partials.elements.__submit')
</form>