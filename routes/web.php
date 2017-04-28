<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return redirect('instruction/start');
});


/*
|--------------------------------------------------------------------------
| Routes - instructions
|--------------------------------------------------------------------------
|
| Routes responsible for handling the instructions.
|
*/
Route::get('instruction/start', 'InstructionController@start')->name('instruction.start');
Route::get('instruction/game-overview-one', 'InstructionController@gameOverviewOne')->name('instruction.game-overview-one');
Route::get('instruction/practice', 'InstructionController@practice')->name('instruction.practice');
Route::get('instruction/game-overview-two', 'InstructionController@gameOverviewTwo')->name('instruction.game-overview-two');
Route::get('instruction/end-game/{gameNumber}', 'InstructionController@endGame')->name('instruction.end-game');
Route::get('instruction/new-game/{gameNumber}', 'InstructionController@newGame')->name('instruction.new-game'); // TODO: condition here for when there are no games left
Route::get('instruction/amazon-code', 'InstructionController@amazonCode')->name('instruction.amazon-code');



/*
|--------------------------------------------------------------------------
| Routes - forms
|--------------------------------------------------------------------------
|
| Routes responsible for handling the forms.
|
*/
Route::get('form/demographics', 'FormController@demographics')->name('form.demographics');
Route::post('form/demographics', 'FormController@storeDemographics')->name('form.storeDemographics');

Route::get('form/hexaco', 'FormController@hexaco')->name('form.hexaco');
Route::get('form/expectation', 'FormController@expectation')->name('form.expectation'); // User will try to guess how well the experiment will go
Route::get('form/game-question/{gameNumber}', 'FormController@gameQuestion')->name('form.game-question');
Route::get('form/experiment-feedback', 'FormController@experimentFeedback')->name('form.experiment-feedback');
// TODO: Perhaps another route for the final questionnaire?


/*
|--------------------------------------------------------------------------
| Routes - game
|--------------------------------------------------------------------------
|
| Routes responsible for handling the games.
|
*/
Route::get('game/play/{gameNumber}/{phaseNumber}', 'GameController@play')->name('game.play');
Route::get('game/result/{gameNumber}/{phaseNumber}', 'GameController@result')->name('game.result');



// experimenting
//Route::get('/', function () {
////    $stud = DB::table('studies')->where('name', '2017_04_game_theory_02')->first();
////    $desi = DB::table('designs')->where('name', 'MD')->first();
////    $cond = DB::table('conditions')->where('name', 'Point Game')->first();
////    dd(array($stud, $cond, $desi));
//
//    $c = DB::table('conditions')->where('name', 'Point Game')->first();
//    return $c->tester();
//
//});
//
//Route::get('/choice', function () {
//
//    $melted_data = array(
//        'label' => 'points',
//        'game_score' => 123,
//        'current_game' => 1,
//        'total_games' => 9,
//        'current_iteration' => 1,
//        'total_iterations' => 10,
//        'visibility' => true,
//        'condition_name' => 'Wall Street',
//        'condition_description' => 'Als jij voor Optie 1 kiest en de andere speler kiest voor Optie 2, zul jij 12 geldeenheden krijgen en de andere speler 8 geldeenheden. Als de andere speler echter ook voor Optie 1 kiest, krijgen jullie allebei 4 geldeenheden. Als je voor Optie 2 kiest en de andere speler kiest voor Optie 1, zal de andere speler de 12 geldeenheden krijgen en jij 8 geldeenheden. Als de andere speler echter ook voor Optie 2 kiest, zullen jullie allebei 1 geldeenheid krijgen.',
//        'condition_opponent' => 'Robin',
//        'design_outcome' => array(
//            '1#1' => '+80#+80',
//            '1#2' => '-20#+40',
//            '2#1' => '+40#-20',
//            '2#2' => '+5#+5'
//        )
//    );
//
//    return view('choice', $melted_data);
//});
//
//Route::get('/result', function () {
//    $melted_data = array(
//        'visibility' => true,
//        'game_score' => 123,
//        'current_game' => 1,
//        'total_games' => 9,
//        'current_iteration' => 1,
//        'total_iterations' => 10,
//        'condition_name' => 'Wall Street',
//        'condition_opponent' => 'Robin',
//        'user_choice' => '1',
//        'pc_choice' => '2',
//        'user_outcome' => '32',
//        'pc_outcome' => '12',
//        'label' => 'points',
//        'design_outcome_description' => 'Als jij voor Optie 1 kiest en de andere speler kiest voor Optie 2, zul jij 12 geldeenheden krijgen en de.',
//        'url' => 'next-url'
//    );
//
//    return view('result', $melted_data);
//});
//
//Route::get('/instruction', function () {
//    $data = array(
//        'visibility' => true,
//        'instruction_title' => 'Long instruction title here',
//        'instruction_body' => 'Welkom in het volgende deel van de studie. Je zult zo direct om demographische gegevens gevraagd worden.',
//        'url' => 'next-url'
//    );
//
//    return view('instruction', $data);
//});
//
//Route::get('/hex', function () {
//    $data = array(
//        'items' => array(
//            1 => 'Item 1',
//            2 => 'Item 2',
//            3 => 'Item 3',
//            4 => 'Item 4',
//            5 => 'Item 5',
//        ),
//        'scale' => array(
//            'Welkom in het volgende',
//            'Welkom in het volgende',
//            'Welkom in het volgende',
//            'Welkom in het volgende',
//            'Welkom in het volgende',
//        ),
//        'visibility' => true,
//        'instruction_title' => 'Long instruction title here',
//        'instruction_body' => 'Welkom in het volgende deel van de studie. Je zult zo direct om demographische gegevens gevraagd worden.',
//        'url' => 'next-url'
//    );
//
//    return view('forms.personality', $data);
//});
//
//
//