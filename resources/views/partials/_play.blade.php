{{--game table: when user has to make a choice--}}

@include('partials.elements.__timestamp')

<div class="condition-iteration">

    <table class="table table-sm choice-table">
        <caption>
            <div class="condition-title title">{{$condition_name}}: <span id="gameNumber">{{$current_game}}</span></div>
            <div class="condition-description text-justify">{{$condition_description}}</div>
            <div class="condition-opponent">Opponent name: {{$condition_opponent}}</div>
        </caption>

        <thead>
            <tr>
                <th>Your choice</th>
                <th>{{$condition_opponent}}'s choice</th>
                <th>Your outcome</th>
                <th>{{$condition_opponent}}'s outcome</th>
            </tr>
        </thead>

        <tbody>
        @foreach($design_outcome as $choices => $outcomes)
            @php $choices = explode('#', $choices) @endphp
            @php $outcomes = explode('#', $outcomes) @endphp
            <tr>
                <td>Option {{$choices[0]}}</td>
                <td>Option {{$choices[1]}}</td>
                <td>{{$outcomes[0]}} {{$label}}</td>
                <td>{{$outcomes[1]}} {{$label}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('partials.elements.__option')

</div>