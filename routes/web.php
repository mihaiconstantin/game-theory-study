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
Route::get('instruction/score/{gameNumber}'     , 'InstructionController@score')            ->name('instruction.score');
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
Route::get('form/consent'                               , 'FormController@consent')                                 ->name('form.consent');
Route::get('form/demographics'                          , 'FormController@demographics')                            ->name('form.demographics');
Route::get('form/expectation'                           , 'FormController@expectation')                             ->name('form.expectation');
Route::get('form/opponent-evaluation/{gameNumber}'      , 'FormController@opponentEvaluation')                      ->name('form.opponent-evaluation');
Route::get('form/game-question/{gameNumber}'            , 'FormController@gameQuestion')                            ->name('form.game-question');
Route::get('form/feedback'                              , 'FormController@feedback')                                ->name('form.feedback');
Route::get('form/study-evaluation-form'                 , 'FormController@studyEvaluationForm')                     ->name('form.study-evaluation-form');
Route::get('form/study-evaluation-question/{name}'      , 'FormController@studyEvaluationQuestion')                 ->name('form.study-evaluation-question');


Route::post('form/consent'                              , 'FormController@storeConsent')                            ->name('form.store-consent');
Route::post('form/demographics'                         , 'FormController@storeDemographics')                       ->name('form.store-demographics');
Route::post('form/questionnaire'                        , 'FormController@storeQuestionnaire')                      ->name('form.store-questionnaire');
Route::post('form/expectation'                          , 'FormController@storeExpectation')                        ->name('form.store-expectation');
Route::post('form/opponent-evaluation'                  , 'FormController@storeOpponentEvaluation')                 ->name('form.store-opponent-evaluation');
Route::post('form/game-question'                        , 'FormController@storeGameQuestion')                       ->name('form.store-game-question');
Route::post('form/feedback'                             , 'FormController@storeFeedback')                           ->name('form.store-feedback');
Route::post('form/study-evaluation-form'                , 'FormController@storeStudyEvaluationForm')                ->name('form.store-study-evaluation-form');
Route::post('form/study-evaluation-question'            , 'FormController@storeStudyEvaluationQuestion')            ->name('form.store-study-evaluation-question');



/*
|--------------------------------------------------------------------------
| Routes - game
|--------------------------------------------------------------------------
|
| Routes responsible for handling the games.
|
*/
Route::get('game/play/{gameNumber}/{phaseNumber}'    , 'GameController@play')     ->name('game.play');
Route::get('game/result/{gameNumber}/{phaseNumber}'  , 'GameController@result')   ->name('game.result');

Route::post('game/store/'                            , 'GameController@store')    ->name('game.store');


/*
|--------------------------------------------------------------------------
| Routes - admin
|--------------------------------------------------------------------------
|
| Routes responsible for handling admin actions.
|
*/
Route::get('admin/export' ,             'DataController@export')            ->name('data.export');
Route::get('admin/emergency-export' ,   'DataController@emergencyExport')   ->name('data.emergency-export');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
