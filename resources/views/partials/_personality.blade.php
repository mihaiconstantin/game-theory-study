{{--HEXACO questionaire--}}

<form action="">
    <table class="table table-sm hexaco-table">
        <caption>
            @include('partials.elements.__description')
        </caption>

        <thead>
            <tr>
                <th></th>
                @foreach($scale as $step)
                    <th>{{$step}}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach($items as $item_nr => $item_text)
                <tr>
                    <td>{{$item_text}}</td>
                    @for($i = 0; $i < count($scale); $i++)
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label custom-control custom-radio">
                                    <input class="form-check-input custom-control-input" type="radio" required name="item_{{$item_nr}}" id="item_{{$item_nr}}#option_{{$i}}" value="{{$i}}">
                                    <span class="custom-control-indicator"></span>
                                </label>
                            </div>
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('partials.elements.__submit')
</form>