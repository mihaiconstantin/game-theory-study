{{--Personality questionaire determined on route parameter--}}

<form action="{{URL::route('form.storePersonality')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include('macros.questionnaire')

    @include('partials.elements.__submit')
</form>