<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivityLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = session()->has('user') ? session()->get('user')->id : null;
        $route = $request->route() ? $request->route()->getName() : $request->path();
        $method = $request->method();
        $data = json_encode($request->except(['_token', '_method' , 'password', 'password_confirmation']));
        $query = $request->getQueryString();

        $log = new ActivityLog();
        $log->user_id = $user;
        $log->route = $route;
        $log->method = $method;
        $log->data = $data;
        $log->queryString = $query;

        $log->save();

        return $next($request);
    }
}
