<?php namespace App\Http\Middleware;

use App\Events\PodcastWasPurchased;
use Closure;
use App\User;
use Auth;

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
		if(!$this->user || !$this->user){
			return redirect()->guest('auth/login');
		}
		if(!$this->user){
			return redirect()->back()->withErrors('您不是管理员，不能访问后台');
		}
		return $next($request);
	}

}
