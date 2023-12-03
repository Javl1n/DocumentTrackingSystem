<?php

namespace App\Http\Middleware;

use App\Models\BarangayHealthWorker;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BarangayWithCHOAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->can("bhw")){
            $request->barangay->id;

            $worker = BarangayHealthWorker::where('user_id', $request->user()->id)->first();

            if($worker->barangay->slug !== $request->barangay->slug )
            {
                abort(Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);
    }
}
