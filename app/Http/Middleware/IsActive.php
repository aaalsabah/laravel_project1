<?php
   
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
  
class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!auth()->user()->is_active) {
    //         return response()->json('Your account is inactive');
    //     }
  
    //     return $next($request);
    // }


    public function handle($request, Closure $next)
    {
      $user = $request->user();
      if ($user && $user->role_id == 1) {
          return $next($request);
      }else{
          Session::flash('alert-class', 'alert-danger');
          Session::flash('message', 'You are not authorized to access this page');
          return redirect('/');
          // return response()->json('Your account is inactive');
      }  
    }   
}