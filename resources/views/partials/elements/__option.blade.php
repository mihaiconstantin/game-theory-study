<form action="{{URL::route('game.storePlay')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_current_game" value="{{ $current_game }}">
    <input type="hidden" name="_current_phase" value="{{ $current_iteration }}">

    <div class="choice-options text-center">
        <h5>Which option do you choose?</h5>

        <button type="submit" name="option" value="1" id="opt_1" class="btn btn-primary">Option 1</button>
        <button type="submit" name="option" value="2" id="opt_2" class="btn btn-primary">Option 2</button>
    </div>
</form>