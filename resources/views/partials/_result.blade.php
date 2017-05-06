{{--result table: feedback on user's choice--}}

@include('partials.elements.__helper_fields')

<div class="condition-iteration-result">

    <table class="table table-sm choice-table">
        <caption>
            <div class="condition-title title">{{$data['condition_name']}} &ndash; Game <span id="gameNumber">{{$data['game_number']}}</span></div>
            <div class="condition-description text-justify"><span class="badge badge-default">Info:</span><br>{{$data['design_outcome_description']}}</div>
        </caption>
        <tbody>
            <tr>
                <th>Your choice</th>
                <th>{{$data['condition_opponent']}}'s choice</th>
                <th>Your outcome</th>
                <th>{{$data['condition_opponent']}}'s outcome</th>
            </tr>
            <tr>
                <td>Option {{$data['user_choice']}}</td>
                <td>Option {{$data['pc_choice']}}</td>
                <td>{{$data['user_outcome']}} {{$data['design_label']}}</td>
                <td>{{$data['pc_outcome']}} {{$data['design_label']}}</td>
            </tr>
        </tbody>
    </table>

    @include('partials.elements.__continue')

</div>
