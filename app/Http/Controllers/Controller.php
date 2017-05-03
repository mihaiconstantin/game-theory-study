<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Fetches an App\Models\Instruction object from the database
     * using the $current_url as a search phrase
     *
     * @param string $current_url
     * @param string $table
     * @return mixed
     */
    protected function InstructionLoader(string $current_url, string $table = 'instructions')
    {
        $instruction = DB::table($table)->where('current_url', $current_url)->first();
        $instruction->url_parameters = [];
        return $instruction;
    }
}

/**
 * TODO: Later we might want to add server-side validations for the form inputs.
 *       For now we will use that if the user is going to do something fishy
 *       he probably isn't a reliable source of information in the study.
 *
 * TODO: Refactor the InstructionLoader into an appropriate query scope.
 */
