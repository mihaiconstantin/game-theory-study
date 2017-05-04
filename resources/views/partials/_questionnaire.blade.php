{{--Personality questionaire determined on route parameter--}}

<form action="{{URL::route('form.storeQuestionnaire')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_questionnaire" value="{{$name}}">

    @include('macros.questionnaire')

    @include('partials.elements.__submit')
</form>