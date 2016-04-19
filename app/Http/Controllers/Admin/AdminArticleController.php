<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Input,Redirect,Auth;

use Illuminate\Http\Request;

class AdminArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		\Event::fire(new \App\Events\PodcastWasPurchased());
		$articles = Article::orderBy('article_id','desc')->paginate(10);
		return view('admin/article/index')->withArticles($articles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/article/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			'content' => 'required',
			'display_time'=>'date',
		]);
		$article = new Article();
		$article->title = Input::get('title');
		$article->content = Input::get('content');
		$article->user_id = Auth::id();
		$article->display_time = strtotime(Input::get('display_time'));
		if ($article->save()) {
			return Redirect::to('admin/article');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('admin/article/show')->withArticle(Article::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin/article/edit')->withArticle(Article::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			'content' => 'required',
			'display_time'=>'date',
		]);
		$article = Article::find($id);
		$article->title = Input::get('title');
		$article->content = Input::get('content');
		$article->user_id = Auth::id();
		$article->display_time = strtotime(Input::get('display_time'));
		if ($article->save()) {
			return Redirect::to('admin/article');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::find($id);
		$article->delete();//删除
		return Redirect::to('admin/article');
	}

}
