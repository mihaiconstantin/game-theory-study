<?php

namespace App\Http\Middleware;

use Closure;

class CheckConsent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('temp.consent'))
        {
            session()->flash('message', 'Your consent is necessary in order to continue.');
            return redirect()->route('form.consent');
        }

        return $next($request);
    }
}


/**
 * TODO: Add another middleware to prevent link-jumping.
 *
 */
