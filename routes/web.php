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
Route::group(['middleware' => ['consent']], function () {
    Route::get('instruction/game-overview-one', 'InstructionController@gameOverviewOne')->name('instruction.game-overview-one');
    Route::get('instruction/practice', 'InstructionController@practice')->name('instruction.practice');
    Route::get('instruction/game-overview-two', 'InstructionController@gameOverviewTwo')->name('instruction.game-overview-two');
    Route::get('instruction/end-game/{gameNumber}', 'InstructionController@endGame')->name('instruction.end-game');
    Route::get('instruction/new-game/{gameNumber}', 'InstructionController@newGame')->name('instruction.new-game');
    Route::get('instruction/amazon-code', 'InstructionController@amazonCode')->name('instruction.amazon-code');
});


Route::get('instruction/start', 'InstructionController@start')->name('instruction.start');
Route::get('instruction/end', 'InstructionController@end')->name('instruction.end');


/*
|--------------------------------------------------------------------------
| Routes - forms
|--------------------------------------------------------------------------
|
| Routes responsible for handling the forms.
|
*/
Route::get('form/consent', 'FormController@consent')->name('form.consent');
Route::post('form/consent', 'FormController@storeConsent')->name('form.storeConsent');


Route::group(['middleware' => ['consent']], function () {
    Route::get('form/demographics', 'FormController@demographics')->name('form.demographics');
    Route::post('form/demographics', 'FormController@storeDemographics')->name('form.storeDemographics');

    Route::get('form/personality', 'FormController@personality')->name('form.personality')->middleware('consent');
    Route::post('form/personality', 'FormController@storePersonality')->name('form.storePersonality');

    Route::get('form/expectation', 'FormController@expectation')->name('form.expectation'); // User will try to estimate his performance beforehand
    Route::post('form/expectation', 'FormController@storeExpectation')->name('form.storeExpectation');

    Route::get('form/game-question/{gameNumber}', 'FormController@gameQuestion')->name('form.gameQuestion');
    Route::post('form/game-question', 'FormController@storeGameQuestion')->name('form.storeGameQuestion');

    Route::get('form/feedback', 'FormController@feedback')->name('form.feedback');
    Route::post('form/feedback', 'FormController@storeFeedback')->name('form.storeFeedback');
});


/*
|--------------------------------------------------------------------------
| Routes - game
|--------------------------------------------------------------------------
|
| Routes responsible for handling the games.
|
*/
Route::group(['middleware' => ['consent']], function () {
    Route::get('practice/play/{gameNumber}/{phaseNumber}', 'GameController@playPractice')->name('practice.play');
    Route::post('practice/play', 'GameController@storePlayPractice')->name('practice.storePlayPractice');

    Route::get('game/play/{gameNumber}/{phaseNumber}', 'GameController@play')->name('game.play');
    Route::post('game/play', 'GameController@storePlay')->name('game.storePlay');

    Route::get('game/result/{gameNumber}/{phaseNumber}', 'GameController@result')->name('game.result');
});


/**
 * TODO: Move the group middleware under the appropriate controller constructor.
 *
 */