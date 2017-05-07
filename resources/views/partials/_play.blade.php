{{--game table: when user has to make a choice--}}


<div class="condition-iteration">

    <table class="table table-sm choice-table">
        <caption>
            <div class="condition-title title">{{$data['condition_name']}} &ndash; Game <span id="game-number">{{$data['game_number']}}</span></div>
            <div class="condition-description text-justify">{!!$data['condition_text']!!}</div>
            <div class="condition-opponent">Opponent name: {{$data['condition_opponent']}}</div>
        </caption>

        <thead>
            <tr>
                <th>Your choice</th>
                <th>{{$data['condition_opponent']}}'s choice</th>
                <th>Your outcome</th>
                <th>{{$data['condition_opponent']}}'s outcome</th>
            </tr>
        </thead>

        <tbody>
        @foreach($data['design_outcomes'] as $choices => $outcomes)
            @php $choices = explode('#', $choices) @endphp
            @php $outcomes = explode('#', $outcomes) @endphp
            <tr>
                <td>Option {{$choices[0]}}</td>
                <td>Option {{$choices[1]}}</td>
                <td>{{$outcomes[0]}} {{$data['design_label']}}</td>
                <td>{{$outcomes[1]}} {{$data['design_label']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('partials.elements.__option')

</div>