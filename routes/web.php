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


// TODO: Refactor this into a controller and dynamically fetch the names of the questionnaires.
// Export the dataset for the current study.
Route::get('admin/export', function() {

    $study_name = \App\Models\StudyLoader::getLoadedStudy();
    
    try {
        $export = new \App\Helpers\DataExportHelper($study_name);
    } catch(Exception $e) {
        return 'An error occured: ' .$e->getMessage();
    }
    
    $file = $export->zip('hexaco', 'bfi', $study_name);

    return response()->download($file, $name = null, ['Content-Type' => 'application/zip']);

})->middleware('auth');


// Parsing the emergency data that was saved.
Route::get('admin/emergency', function()
{
    // Handy.
    // SELECT * FROM data_participants WHERE code = "rJaDWaWet9";//
    // SELECT * FROM data_configs WHERE data_participant_id = 253;
    // SELECT * FROM data_forms WHERE data_participant_id = 253;
    // SELECT * FROM data_questionnaires WHERE data_participant_id = 253;
    // SELECT * FROM data_game_phases WHERE data_participant_id = 253;


    // $json = '';
    // $assoc = true;
    // $result = json_decode ($json, $assoc);
    //
    // $data_participant_id = 253;
    //
    // DB::table('data_forms')->insert([
    //     [
    //         'data_participant_id' => $data_participant_id,
    //         'demographic' => $result[2]['demographic'],
    //         'expectation' => '{}',
    //         'feedback' => $result[2]['feedback']
    //     ]
    // ]);
    //
    // DB::table('data_questionnaires')->insert([
    //     [
    //         'data_participant_id' => $data_participant_id,
    //         'personality' => $result[3]['personality'],
    //         'game_question' => $result[3]['game_question'],
    //     ]
    // ]);
    //
    // foreach ($result[4] as $index => $item)
    // {
    //     if ($result[4][$index]['game_number'] != null)
    //     {
    //         $result[4][$index]['data_participant_id'] = $data_participant_id;
    //         DB::table('data_game_phases')->insert([$result[4][$index]]);
    //     }
    // }
    //
    //
    // dd(
    //     "Insertion finished.",
    //     $result
    // );

    return 'Not in use. Edit source on demand.';

})->middleware('auth');


// Voyager routes.
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
