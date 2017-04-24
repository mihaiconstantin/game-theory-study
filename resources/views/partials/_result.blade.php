{{--result table: feedback on user's choice--}}

@include('partials.elements.__timestamp')

<div class="condition-iteration-result {{$visibility}}">

    <table class="table table-sm choice-table">
        <caption>
            <div class="condition-title title">{{$condition_name}}: <span id="gameNumber">{{$current_game}}</span></div>
            <div class="condition-description text-justify"><span class="badge badge-default">Info:</span><br>{{$design_outcome_description}}</div>
        </caption>
        <tbody>
            <tr>
                <th>Your choice</th>
                <th>{{$condition_opponent}}'s choice</th>
                <th>Your outcome</th>
                <th>{{$condition_opponent}}'s outcome</th>
            </tr>
            <tr>
                <td>Option {{$user_choice}}</td>
                <td>Option {{$pc_choice}}</td>
                <td>{{$user_outcome}} {{$label}}</td>
                <td>{{$pc_outcome}} {{$label}}</td>
            </tr>
        </tbody>
    </table>

    @include('partials.elements.__continue')

</div>