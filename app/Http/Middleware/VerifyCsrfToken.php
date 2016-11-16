<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'inkbox/userdata'
    ];

    /**
	 * Determine if the session and input CSRF tokens match.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return bool
	 */
	protected function tokensMatch($request)
	{
	    // If request is an ajax request, then check to see if token matches token provider in
	    // the header. This way, we can use CSRF protection in ajax requests also.
	    $token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');

	    return $request->session()->token() == $token;
	}

	public function handle($request, \Closure $next)
    {
    	if(env('APP_ENV') == 'testing')
    	{
    		return $next($request);
    	}

        if($this->excludedRoutes($request))
        {
            return $next($request);
        }

    	return parent::handle($request, $next);
    }

    /**
     * This will return a bool value based on route checking.

     * @param  Request $request
     * @return boolean
     */
    protected function excludedRoutes($request)
    {
        foreach($this->except as $route)
            if ($request->is($route))
                return true;

            return false;
    }
}
