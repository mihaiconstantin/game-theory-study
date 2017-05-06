{{--score box--}}

@if(session('temp.show_score'))

    <div class="box box-transparent">

        <table class="table table-sm score-table">
            <tbody>
                <tr>
                    <th>Total {{$data['design_label']}}:</th>
                    <td class="text-right"><span id="gameScore" class="badge .badge-pill badge-primary" data-game-score="{{$data['game_score']}}">{{$data['game_score']}}</span></td>
                </tr>

                <tr>
                    <td>Game:</td>
                    <td id="gameIteration" class="text-right" data-current-game="{{$data['game_number']}}" data-total-game="{{$data['total_games']}}">{{$data['game_number']}}/{{$data['total_games']}}</td>
                </tr>

                <tr>
                    <td>Phase:</td>
                    <td id="gameIterationXXX" class="text-right" data-current-iteration="{{$data['phase_number']}}" data-total-iteration="{{$data['total_phases']}}">{{$data['phase_number']}}/{{$data['total_phases']}}</td>
                </tr>
            </tbody>
        </table>

    </div>

@endif