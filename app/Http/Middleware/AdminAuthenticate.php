<?php namespace App\Http\Middleware;

use Closure;
use App\User;

class AdminAuthenticate {
	protected $user;
	/**
	 * Create a new filter instance.
	 *
	 * @param  User  $user
	 * @return void
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!$this->user || !$this->user->id){
			return redirect()->guest('auth/login');
		}
		if(!$this->user->admin_id){
			return redirect()->back()->withErrors('您不是管理员，不能访问后台');
		}
		return $next($request);
	}

}
