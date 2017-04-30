{{--demographics from--}}

<div class="instruction-box">
    @include('partials.elements.__description')
</div>

<form action="{{URL::route('form.storeConsent')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="choice-options text-center">
        <h5>Ask him or her again about the agreement with this question here?</h5>

        <button type="submit" name="consent" value="1" id="consent_1" class="btn btn-primary">Yes, I agree</button>
        <button type="submit" name="consent" value="0" id="consent_0" class="btn btn-secondary">No, I do not agree</button>
    </div>
</form>