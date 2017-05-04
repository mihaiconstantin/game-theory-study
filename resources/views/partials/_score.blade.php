{{--score box--}}


<div class="box box-transparent">

    <table class="table table-sm score-table">
        <tbody>
            <tr>
                <th>Total {{$label}}:</th>
                <td class="text-right"><span id="gameScore" class="badge .badge-pill badge-primary" data-game-score="{{$game_score}}">{{$game_score}}</span></td>
            </tr>

            <tr>
                <td>Game:</td>
                <td id="gameIteration" class="text-right" data-current-game="{{$current_game}}" data-total-game="{{$total_games}}">{{$current_game}}/{{$total_games}}</td>
            </tr>

            <tr>
                <td>Phase:</td>
                <td id="gameIterationXXX" class="text-right" data-current-iteration="{{$current_iteration}}" data-total-iteration="{{$total_iterations}}">{{$current_iteration}}/{{$total_iterations}}</td>
            </tr>
        </tbody>
    </table>

</div>