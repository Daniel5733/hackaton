<?php
namespace App\Http\Middleware;

use Closure;
use App\User;

class Security
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
         if ($request->headers->get('x-api-key')) {
                if($request->header('x-api-key') == 'Hackathonfaa09dsaadsl4j2idasoiasdoij3289dsahojkasdhiuoasd89kjhhaszxksakjsjk') {
                    return $next($request);
                }
                return response()->json('Unauthorized. Please authenticate first', 401);
         }
        return response()->json('Unauthorized. Please authenticate first', 401);
    }
}
