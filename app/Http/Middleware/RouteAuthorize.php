<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laracasts\Flash\Flash;

class RouteAuthorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $route = $request->route();

        $user = Auth::user();

        $routeName = $route->getName();

        if (!$user->can($this->route2permission($routeName))) {
            Flash::error(trans('admin.notAuthorized', ['page' => trans($routeName)]));

            return redirect(URL::previous());
        }

        return $next($request);
    }

    private function route2permission($routeName)
    {
        $routeNameArr = explode('.', $routeName);
        $suffix = $routeNameArr[count($routeNameArr) - 1];

        array_pop($routeNameArr);
        $permissionCode = implode('.', $routeNameArr) . '.';
        switch ($suffix) {
            case 'create':
            case 'store':
                $permissionCode .= 'create';
                break;
                break;
            case 'edit':
            case 'update':
            case 'group':
                $permissionCode .= 'update';
                break;
            case 'destroy':
                $permissionCode .= 'delete';
                break;
            default:
                $permissionCode .= 'read';
        }

        return substr_replace($routeName, $permissionCode, $suffix);
    }
}
