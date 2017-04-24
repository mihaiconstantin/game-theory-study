{{--feedback form--}}

<div class="instruction-box {{$visibility}}">
    @include('partials.elements.__instruction')
</div>

<form>
    <div class="form-group">
        <label for="exampleTextarea">Example textarea</label>
        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>

    @include('partials.elements.__submit')
</form>