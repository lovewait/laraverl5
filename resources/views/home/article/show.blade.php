@extends('app')

@section('content')
	<div class="container">
		<div class="row">
                <h3 class="panel-heading text-center">显示 Article</h3>

                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"><span class="badge">{{date('Y-m-m',$article->display_time)}}</span>{{$article->article_id}}</li>
                        <li class="list-group-item">{{$article->content}}</li>
                        <li class="list-group-item"><a href="{{URL::previous()}}">返回</a></li>
                    </ul>
                </div>
			</div>
		</div>
	</div>

@endsection
