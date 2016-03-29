@extends('app')

@section('content')
	<div class="container">
		<div class="row">
                <h3 class="panel-heading text-center">显示 用户</h3>

                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{$user->name}}</li>
                        <li class="list-group-item">{{$user->email}}</li>
                        <li class="list-group-item">{{$user->phone ? $user->phone : 0}}</li>
                        <li class="list-group-item"><a href="{{URL('/article',['user',$user->id])}}">文章列表页</a></li>
                        <li class="list-group-item"><a href="{{URL::previous()}}">返回</a></li>
                    </ul>
                </div>
			</div>
		</div>
	</div>

@endsection
