<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Fetches an App\Models\Instruction object from the database
     * using the $current_url as a search phrase.
     *
     * @param string $current_url
     * @param bool $should_check_incentive
     * @return array
     */
    protected function InstructionLoader(string $current_url, bool $should_check_incentive = true) : array
    {
        $instruction = Instruction::getColumnsByUrl($current_url, [
            'current_url', 'next_url', 'title', 'text'
        ]);

        // Assign an array of empty parameters for routes that do not need them.
        // For the routes that require parameters, we will append on demand.
        $instruction['parameters'] = [];

        if ($should_check_incentive)
        {
            // In case the condition is incentivised, adjust the text accordingly.
            if (session('config.condition.info.incentive') == 1)
            {
                $instruction['text'] = str_replace('{{incentive_text}}', session('config.condition.text.incentive'), $instruction['text']);
            }
            else
            {
                $instruction['text'] = str_replace('{{incentive_text}}', '', $instruction['text']);
            }
        }

        return $instruction;
    }
}

/**
 * TODO: Later we might want to add server-side validations for the form inputs.
 *       For now we will use that if the user is going to do something fishy
 *       he probably isn't a reliable source of information in the study.
 */
