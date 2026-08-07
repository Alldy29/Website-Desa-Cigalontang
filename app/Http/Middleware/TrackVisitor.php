<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $ip = $request->ip();
            $date = Carbon::today()->toDateString();

            $visitor = Visitor::firstOrCreate(
                ['ip_address' => $ip, 'visited_date' => $date],
                ['user_agent' => $request->userAgent(), 'hits' => 0]
            );

            // Increment hits
            $visitor->increment('hits');
        } catch (\Exception $e) {
            // Abaikan error agar tidak mematikan fungsi web utama jika db error
        }

        return $next($request);
    }
}
