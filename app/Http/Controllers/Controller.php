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
     * @return array
     */
    protected function InstructionLoader(string $current_url) : array
    {
        $instruction = Instruction::getColumnsByUrl($current_url, [
            'current_url', 'next_url', 'title', 'text'
        ]);

        // Assign an array of empty parameters for routes that do not need them.
        // For the routes that require parameters, we will append on demand.

        $instruction['parameters'] = [];


        return $instruction;
    }
}

/**
 * TODO: Later we might want to add server-side validations for the form inputs.
 *       For now we will use that if the user is going to do something fishy
 *       he probably isn't a reliable source of information in the study.
 */
