<?php

namespace App\Http\Controllers;


use App\Helpers\BasicHelper;
use App\Helpers\DataArchiveHelper;
use App\Helpers\SessionHelper;
use App\Models\FormElement;
use App\Models\ItemScale;
use App\Models\PersonalityItem;
use App\Models\Study;
use App\Models\StudyLoader;
use Illuminate\Http\Request;


class FormController extends Controller
{

    public function __construct()
    {
        $this->middleware('consent')->except(['consent', 'storeConsent']);
    }



    /*
     * Display the consent form.
     * */
    public function consent()
    {
        $instruction = $this->InstructionLoader('form.consent');

        return view('forms.consent', ['data' => $instruction]);
    }

    /*
     * Display and store the demographics form.
     * */
    public function storeConsent(Request $request)
    {
        // Determine if the user agreed to participate or if
        // he is trying to participate again too soon < 2h.

        if ((int) $request['consent'] == 0)
        {
            return redirect()->route('instruction.end');
        }
        elseif (session('temp.finish'))
        {
            return redirect()->route('instruction.not-allowed');
        }


        // Prepare the general variables needed to initialize the session storage process.

        $study_name = StudyLoader::getLoadedStudy();
        $condition_name = BasicHelper::randomAssign($study_name);
        $practice_name = Study::getColumnsByName($study_name, ['practice'])['practice'];


        // Build a session skeleton packed with config data only (i.e., ['config']).
        // This might be a good place to initialize a new DataParticipant model
        // and store the config data to the database. Immediately after that,
        // push the auto-generated id to session so later we can use the
        // Eloquent relationships to store the remaining data easily.

        $skeleton = new SessionHelper($condition_name, $practice_name);


        // Push the skeleton to the session.

        session($skeleton->getSkeleton());


        // Update whatever session keys are relevant to be updated now.

        session([
            'temp.consent' => true,
            'temp.study_start' => microtime(true),
            'temp.passed_practice' => false,

            'storage.data_participants.ip' => $request->ip(),
            'storage.data_participants.code' => BasicHelper::userCode(),
            'storage.data_participants.study_name' => $study_name,
            'storage.data_participants.condition_name' => $condition_name
        ]);


        // Send the redirect. The user has successfully started the experiment.

        return redirect(route($this->InstructionLoader('form.consent')['next_url']));
    }


    /*
     * Display and store the demographics form.
     * */
    public function demographics()
    {
        $elements = FormElement::getElementForContext('form.demographics');
        $instruction = $this->InstructionLoader('form.demographics');

        return view('forms.demographics', [
            'data' => $instruction,
            'elements' => $elements
        ]);
    }

    public function storeDemographics(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_forms.demographic', ['_token']);

        return redirect(route($this->InstructionLoader('form.demographics')['next_url']));
    }


    /*
     * Display and store the personality form.
     * */
    public function questionnaire($name)
    {
        // Todo: Here is a small bug: regardless of the fact that we get different items for bfi and hexco,
        // Todo: we get the same instructions, because the Instruction loader does not know how to
        // Todo: differentiate between two routes with the same current url.
        // Todo: Take a look at studyEvaluationQuestion() for a workaround and in the instruction table seeder.
        $instruction = $this->InstructionLoader('form.questionnaire');
        $items = PersonalityItem::getItemsForQuestionnaire($name);
        $steps = ItemScale::getScaleForQuestionnaire($name);

        return view('forms.questionnaire', [
            'data' => $instruction,
            'items' => $items,
            'steps' => $steps,
            'name' => $name
        ]);
    }

    public function storeQuestionnaire(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_questionnaires.' . request('_questionnaire'), ['_token']);

        if (request('_questionnaire') == 'hexaco')
        {
            return redirect(route('form.questionnaire', ['name' => 'bfi']));
        }

        return redirect(route('instruction.announcement'));
    }


    /*
     * Display and store the expectation form.
     * */
    public function expectation()
    {
        $instruction = $this->InstructionLoader('form.expectation');
        $elements = FormElement::getElementForContext('form.expectation');

        return view('forms.expectation', [
            'data' => $instruction,
            'elements' => $elements
        ]);
    }

    public function storeExpectation(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_forms.expectation', ['_token']);

        session(['temp.passed_practice' => true]);

        return redirect(route($this->InstructionLoader('form.expectation')['next_url'], [
            'gameNumber' => 1,
            'phaseNumber' => 1
        ]));
    }


    /*
     * Display and store the opponent-evaluation/{gameNumber} form.
     * */
    public function opponentEvaluation($gameNumber)
    {
        $instruction = $this->InstructionLoader('form.opponent-evaluation');
        $elements = FormElement::getElementForContext('form.opponent-evaluation');

        return view('forms.opponent_evaluation', [
            'data' => $instruction,
            'elements' => $elements,
            'gameNumber' => $gameNumber,
            // The name helps us know where in the session object we need to push the results.
            'name' => 'game_opponent_evaluation'
        ]);
    }

    public function storeOpponentEvaluation(Request $request) {
        // Store the form data into session. In this case we regard the form as a 'questionnaire' because it is recurring after each game.
        SessionHelper::pushSerialized($request, 'storage.data_questionnaires.' . request('_questionnaire') . '.' . request('_game_number'), ['_token']);

        // Continue to next url.
        return redirect(route($this->InstructionLoader('form.opponent-evaluation')['next_url'], [
            'gameNumber' => $request->get('_game_number')
        ]));
    }


    /*
     * Display and store the game-question/{gameNumber} form.
     * */
    public function gameQuestion($gameNumber)
    {
        $instruction = $this->InstructionLoader('form.game-question');
        $items = PersonalityItem::getItemsForQuestionnaire('game_question');
        $steps = ItemScale::getScaleForQuestionnaire('game_question');

        return view('forms.game_question', [
            'data' => $instruction,
            'items' => $items,
            'steps' => $steps,
            'gameNumber' => $gameNumber,
            'name' => 'game_question'
        ]);
    }

    public function storeGameQuestion(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_questionnaires.' . request('_questionnaire') . '.' . request('_game_number'), ['_token']);

        // If there are no games left redirect to the debriefing instructions.

        if (session('temp.next_game') == 0)
        {
            return redirect()->route('form.study-evaluation-form');
        }

        return redirect(route($this->InstructionLoader('form.game-question')['next_url'], [
            'gameNumber' => session('temp.next_game')
        ]));
    }


    /*
     * Display and store the form/study-evaluation-form/ form.
     * */
    public function studyEvaluationForm()
    {
        $instruction = $this->InstructionLoader('form.study-evaluation-form');
        $elements = FormElement::getElementForContext('form.study-evaluation-form');

        return view('forms.study_evaluation_form', [
            'data' => $instruction,
            'elements' => $elements
        ]);
    }

    public function storeStudyEvaluationForm(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_forms.realization', ['_token']);

        return redirect(route($this->InstructionLoader('form.study-evaluation-form')['next_url'], [
            'name' => 'wallstreet'
        ]));
    }


    /*
     * Display and store the form/study-evaluation-question/{wallstreet or community} questionnaire.
     * Items and scales will change accordingly.
     * */
    public function studyEvaluationQuestion($name)
    {
        $instruction = $this->InstructionLoader('form.study-evaluation-question.' . $name);
        $items = PersonalityItem::getItemsForQuestionnaire($name);
        $steps = ItemScale::getScaleForQuestionnaire($name);

        // dd($instruction);

        return view('forms.study_evaluation_question', [
            'data' => $instruction,
            'items' => $items,
            'steps' => $steps,
            'name'  => $name
        ]);
    }

    public function storeStudyEvaluationQuestion(Request $request)
    {
        SessionHelper::pushSerialized($request, 'storage.data_questionnaires.' . request('_questionnaire'), ['_token']);

        if (request('_questionnaire') == 'wallstreet')
        {
            return redirect(route('form.study-evaluation-question', [
                'name' => 'community'
            ]));
        }

        return redirect(route('instruction.debriefing'));
    }


    /*
     * Display and store the feedback form.
     * */
    public function feedback()
    {
        $instruction = $this->InstructionLoader('form.feedback');
        $elements = FormElement::getElementForContext('form.feedback');

        return view('forms.feedback', [
            'data' => $instruction,
            'elements' => $elements
        ]);
    }

    public function storeFeedback(Request $request)
    {
        // This is the page of choice where we actually store the data.
        // First let's compute the total time he spent in the study.
        // Additionally, we can determine other relevant keys.

        // Since we are saving data here, we need to make
        // sure that the user doesn't resubmit the form
        // causing data override. Thus, allow him to
        // pass by only once on this page.

        // It's fair enough to mark the study as finished, because he just
        // answered the last game form, meaning that it's finally over.
        // On subsequent requests to the same page, if he already
        // visited this page, he will not be allowed to submit
        // the form again, because the redirect will trigger.

        // Redirect if this isn't the first time he comes here.

        if (session('temp.finish'))
        {
            return redirect()->route('instruction.not-allowed');
        }

        // If it is the first time he comes here, then leave a trail.

        session(['temp.finish' => true]);


        // Set some relevant session keys.

        $study_end = microtime(true);
        $base_key = 'storage.data_participants.';

        session([
            'temp.study_end' => $study_end,

            $base_key . 'study_time'                => session('temp.study_start') - session('temp.study_end'),
            $base_key . 'game_phases_played'        => BasicHelper::totalPhasesPlayed('condition'),
            $base_key . 'practice_phases_played'    => BasicHelper::totalPhasesPlayed('practice')
        ]);


        SessionHelper::pushSerialized($request, 'storage.data_forms.feedback', ['_token']);


        // Time to store the data to the database.
        // Or log it to the file if it fails...

        $archive = new DataArchiveHelper(session('storage'), session('config'));
        $archive->saveArchive();


        // This concludes the business.

        return redirect(route($this->InstructionLoader('form.feedback')['next_url']));
    }

}
