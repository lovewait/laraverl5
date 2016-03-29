<?php namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('home/user/show')->withUser(User::find($id));
	}

}
