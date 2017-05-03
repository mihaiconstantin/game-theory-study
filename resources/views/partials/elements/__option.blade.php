<form action="{{URL::route($store_route)}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include('partials.elements.__helper_fields')

    <div class="choice-options text-center">
        <h5>Which option do you choose?</h5>

        <button type="submit" name="option" value="1" id="opt_1" class="btn btn-primary">Option 1</button>
        <button type="submit" name="option" value="2" id="opt_2" class="btn btn-primary">Option 2</button>
    </div>
</form>