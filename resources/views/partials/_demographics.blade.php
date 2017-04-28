{{--demographics from--}}

<div class="instruction-box">
    @include('partials.elements.__description')
</div>

<form action="{{URL::route('form.demographics')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label for="participant_number">Participant number</label>
        <input type="number" class="form-control" id="participant_number" name="participant_number" placeholder="123">
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender">
            <option>choose an option</option>
            <option>male</option>
            <option>female</option>
            <option>other</option>
        </select>
    </div>

    <div class="form-group">
        <label for="text">Text</label>
        <input type="text" class="form-control" id="text" placeholder="Another input">
    </div>

    @include('partials.elements.__submit')
</form>


{{--Route::currentRouteName();--}}