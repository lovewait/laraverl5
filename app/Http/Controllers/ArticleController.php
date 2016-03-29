<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($user_id=0)
	{
		if($user_id > 0){
			$articles = Article::where('user_id',$user_id)->orderBy('article_id','desc')->paginate(10);
		}else{
			$articles = Article::orderBy('article_id','desc')->paginate(10);
		}
		return view('home/article/index')->withArticles($articles);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('home/article/show')->withArticle(Article::find($id));
	}
}
