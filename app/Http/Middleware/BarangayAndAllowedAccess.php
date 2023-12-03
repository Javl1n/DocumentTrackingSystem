<?php

namespace App\Http\Middleware;

use App\Models\BarangayHealthWorker;
use App\Models\DocumentAccess;
use App\Models\DocumentDate;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BarangayAndAllowedAccess
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

            $date = DocumentDate::where("date", $request->date)->first();

            $worker = BarangayHealthWorker::where('user_id', $request->user()->id)->first();

            $access = DocumentAccess::where('user_id', $request->user()->id)
                                    ->where('document_date_id', $date->id)
                                    ->first();

            if($worker->barangay->slug !== $request->barangay->slug && empty($access))
            {
                abort(Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);
    }
}
