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
Route::get('instruction/start'                  , 'InstructionController@start')            ->name('instruction.start');
Route::get('instruction/announcement'           , 'InstructionController@announcement')     ->name('instruction.announcement');
Route::get('instruction/practice'               , 'InstructionController@practice')         ->name('instruction.practice');
Route::get('instruction/condition'              , 'InstructionController@condition')        ->name('instruction.condition');
Route::get('instruction/new-game/{gameNumber}'  , 'InstructionController@newGame')          ->name('instruction.new-game');
Route::get('instruction/debriefing'             , 'InstructionController@debriefing')       ->name('instruction.debriefing');
Route::get('instruction/amazon-code'            , 'InstructionController@amazonCode')       ->name('instruction.amazon-code');
Route::get('instruction/end'                    , 'InstructionController@end')              ->name('instruction.end');
Route::get('instruction/not-allowed'            , 'InstructionController@notAllowed')       ->name('instruction.not-allowed');



/*
|--------------------------------------------------------------------------
| Routes - forms
|--------------------------------------------------------------------------
|
| Routes responsible for handling the forms.
|
*/
Route::get('form/consent'                   , 'FormController@consent')             ->name('form.consent');
Route::get('form/demographics'              , 'FormController@demographics')        ->name('form.demographics');
Route::get('form/questionnaire/{name}'      , 'FormController@questionnaire')       ->name('form.questionnaire');
Route::get('form/expectation'               , 'FormController@expectation')         ->name('form.expectation');
Route::get('form/game-question/{gameNumber}', 'FormController@gameQuestion')        ->name('form.gameQuestion');
Route::get('form/feedback'                  , 'FormController@feedback')            ->name('form.feedback');

Route::post('form/consent'                  , 'FormController@storeConsent')        ->name('form.storeConsent');
Route::post('form/demographics'             , 'FormController@storeDemographics')   ->name('form.storeDemographics');
Route::post('form/questionnaire'            , 'FormController@storeQuestionnaire')  ->name('form.storeQuestionnaire');
Route::post('form/expectation'              , 'FormController@storeExpectation')    ->name('form.storeExpectation');
Route::post('form/game-question'            , 'FormController@storeGameQuestion')   ->name('form.storeGameQuestion');
Route::post('form/feedback'                 , 'FormController@storeFeedback')       ->name('form.storeFeedback');


/*
|--------------------------------------------------------------------------
| Routes - game
|--------------------------------------------------------------------------
|
| Routes responsible for handling the games.
|
*/
Route::get('game/play/{gameNumber}/{phaseNumber}'                   , 'GameController@play')            ->name('game.play');
Route::get('game/result/{gameNumber}/{phaseNumber}'                 , 'GameController@result')          ->name('game.result');

Route::post('game/store/'                                           , 'GameController@store')           ->name('game.store');
